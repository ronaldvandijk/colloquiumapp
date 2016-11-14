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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->overview();
    }

    public function edit(User $user)
    {
        return view('admin/users/edit', ['user' => $user, 'roles' => Role::all()]);
    }

    /**
     * Delete a user from the database
     * @param int $userId The ID of the user that should be deleted
     * @return view
     */
    public function delete($userId) {

        // Validate the user ID
        if (!User::where('id', $userId)->exists() || $userId == \Auth::user()->id) {
            \Session::flash('failure', trans('admin.delete_user_failed'));
            return \Redirect::back();
        }

        // Delete the user from the database and return to the overview
        try {
            $result = \DB::table('users')->where('id', $userId)->delete();
        }
        catch (\Exception $e) {
            \Session::flash('failure', trans('admin.delete_user_failed'));
            return \Redirect::back();
        }
        \Session::flash('delete_success', trans('admin.success'));
        return \Redirect::back();
    }

    public function overview()
    {
        $users = User::all();
        return view('admin.users.overview')->with('users', $users);
    }
}