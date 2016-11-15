<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Request;


class UsersController extends Controller
{
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
     * Delete a user from the database
     * @param int $id The ID of the user that should be deleted
     * @return view
     */
    public function delete($id) {

        // Validate the user ID
        if (!User::where('id', $id)->exists() || $id == \Auth::user()->id) {
            \Session::flash('custom_error', trans('admin.user_not_found'));
            return \Redirect::back();
        }

        if ((\App\Models\Colloquium::where('user_id', $id)->count()) > 0) {
            \Session::flash('custom_error', trans('admin.cannot_delete_has_colloquia'));
            return \Redirect::back();
        }

        // Delete the user from the database and return to the overview
        try {
            User::findOrFail($id)->delete();
        }
        catch (\Exception $e) {
            \Session::flash('custom_error', trans('admin.delete_user_failed'));
            return \Redirect::back();
        }
        return \Redirect::back();
        if (!empty($_POST))
            $this->saveeditprofile();
        $roles = Role::all();
        return view('admin/users/edit', ['user' => $user, 'roles' => $roles]);
    }

    public function overview()
    {
        $users = User::all();
        return view('admin.users.overview')->with('users', $users);
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin/users/edit', ['user' => $user, 'roles' => $roles]);
    }
    public function editprofile()
    {
        if (!empty($_POST['id']))
            die;//$this->saveditprofile();

        $user = User::find(Auth::user()->id);
        return view('laraveleditprofile::editprofile', ["user" => $user]);
    }

    /**
     * @param $input
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveeditprofile()
    {

        $input = Request::all();

        $user = User::find($input['id']);
        $user->first_name = $input["first_name"];
        if (!empty($input['password']))
            $user->password = bcrypt($input['password']);
        $user->insertion = $input["insertion"];
        $user->last_name = $input["last_name"];
        $user->email = $input["email"];
        $user->role_id = $input["role"];
        $user->save();
        return \Redirect::back();


    }
}