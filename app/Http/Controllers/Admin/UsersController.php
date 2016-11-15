<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use \Session;
use \Redirect;
use \App\Models\Colloquium;

class UsersController extends Controller
{
    private $_avatarPath;
    private $_avatarId;
    private $_imageExtensions;
    private $_maxSize;

    public function edit(User $user)
    {
        return view('admin/users/edit', ['user' => $user, 'roles' => Role::all()]);
    }

    /**
     * Delete a user from the database
     * @param int $id The ID of the user that should be deleted
     * @return view
     */
    public function delete($id) 
    {
        // Validate the user ID
        if (!User::where('id', $id)->exists() || $id == \Auth::user()->id) {
            Session::flash('custom_error', [
                'type' => 'danger',
                'message' => trans('admin.user_not_found'),
            ]);
            return Redirect::back();
        }

        if ((Colloquium::where('user_id', $id)->count()) > 0) {
            Session::flash('custom_error', [
                'type' => 'danger',
                'message' => trans('admin.cannot_delete_has_colloquia'),
            ]);
            return Redirect::back();
        }

        // Delete the user from the database and return to the overview
        User::findOrFail($id)->delete();
      
        return Redirect::back();
    }

    public function overview()
    {
        $users = User::all();
        return view('admin.users.overview')->with('users', $users);
    }
}