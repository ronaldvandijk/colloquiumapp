<?php
/**
 * UsersController for the Admins
 *
 * @author       Sander van Kasteel <info@sandervankasteel.nl>
 * @author       Robert
 * @author       Jamie Schouten
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use \App\Models\Colloquium;
use \Redirect;
use \Session;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    /**
     * Path to where the avatar should be stored
     * @var
     */
    private $_avatarPath;
    /**
     * ID of the avatar
     * @var
     */
    private $_avatarId;
    /**
     * Image extensions that are allowed
     * @var
     */
    private $_imageExtensions;
    /**
     * Max size of the image
     * @var
     */
    private $_maxSize;

    /**
     * Displays a listing of the resource
     *
     * @return View
     */
    public function overview()
    {
        $users = User::all();
        return view('admin.users.overview')->with('users', $users);
    }

    /**
     * Displays a form for editing the resource
     *
     * @param  User   $user
     * @return View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    /**
     * Displays a form for editing the resource
     *
     * @param  User   $user
     * @return View
     */
    public function create(User $user)
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Displays a form for editing the resource
     *
     * @param  UserRequest   $request
     * @return View
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());

        Session::flash('custom_error', [
            'type' => 'success',
            'message' => trans('common.modelcreated', ['modelName' => trans('common.user')]),
        ]);

        return redirect(action('Admin\UsersController@overview'));
    }

    /**
     * Updates the resource in the database
     * @param  UserRequest $request
     * @param  User   $user
     * @return View
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        Session::flash('custom_error', [
            'type' => 'success',
            'message' => trans('common.modelupdated', ['modelName' => trans('common.user')]),
        ]);

        return redirect(action('Admin\UsersController@overview'));
    }

    /**
     * Delete a user from the database
     *
     * @param int $id The ID of the user that should be deleted
     * @return view
     */
    public function destroy($id)
    {
        // Validate the user ID
        if (!User::where('id', $id)->exists() || $id == \Auth::user()->id) {
            Session::flash('custom_error', [
                'type' => 'danger',
                'message' => trans('admin.user_not_found'),
            ]);

            return Redirect::back();
        }

        if (Colloquium::where('user_id', $id)->count() > 0) {
            Session::flash('custom_error', [
                'type' => 'danger',
                'message' => trans('admin.cannot_delete_has_colloquia'),
            ]);
            return Redirect::back();
        }

        Session::flash('custom_error', [
            'type' => 'success',
            'message' => trans('common.deleted_msg'),
        ]);

        // Delete the user from the database and return to the overview
        User::findOrFail($id)->delete();

        return Redirect::back();
    }

}
