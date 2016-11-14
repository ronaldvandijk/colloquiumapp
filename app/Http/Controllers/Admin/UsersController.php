<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

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
    public function delete($id) {

        // Validate the user ID
        if (!User::where('id', $id)->exists() || $id == \Auth::user()->id) {
            \Session::flash('message', trans('admin.delete_user_failed'));
            return \Redirect::back();
        }

        /**
         * @todo Update to model format and add error message
         */
        if ((DB::table('colloquia')->where('user_id', $id)->count()) > 0)
            return \Redirect::back();

        // Delete the user from the database and return to the overview
        try {
            User::findOrFail($id)->delete();
        }
        catch (\Exception $e) {
            \Session::flash('message', trans('admin.delete_user_failed'));
            return \Redirect::back();
        }
        return \Redirect::back();
    }

    public function overview()
    {
        $users = User::all();
        return view('admin.users.overview')->with('users', $users);
    }
}