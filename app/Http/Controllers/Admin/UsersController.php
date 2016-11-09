<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');

    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin/users/edit', ['user' => $user, 'roles' => $roles]);
    }

    public function overview()
    {
        $users = User::all();
        return view('admin/users/overview')->with('users', $users);
    }
}
