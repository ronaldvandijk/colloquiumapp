<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

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

    public function edit(User $user)
    {
        return view('admin/users/edit', ['user' => $user, 'roles' => Role::all()]);
    }

    public function overview()
    {
        return view('admin/users/overview', ['users' => User::all()]);
    }
}
