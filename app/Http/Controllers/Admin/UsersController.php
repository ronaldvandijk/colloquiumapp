<?php
namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        $this->_avatarPath = __DIR__ . '/../../../../avatars';
        $this->_imageExtensions = array('png', 'jpg', 'jpeg', 'gif');
        $this->_maxAvatarSize = 400000;
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
            $users = User::all();
            return view('admin/users/overview')->with('users', $users)->with('failure', true);
        }

        // Delete the user from the database and return to the overview
        $result = \DB::table('users')->where('id', $userId)->delete();
        $users = User::all();
        return view('admin/users/overview')->with('users', $users)->with((!$result ? 'failure' : 'success'), true);
    }

    public function overview()
    {
        return view('admin/users/overview', ['users' => User::all()]);
    }

    /**
     * Upload an avatar
     * @param file $file The file that should be uploaded
     * @return boolean
     */
    private function uploadAvatar($avatar) {

        // The image should have a certain extension
        if (!in_array($avatar->getClientOriginalExtension, $this->_imageExtensions))
            return 'wrong_extension';
        elseif ($avatar->getSize() > $this->_maxAvatarSize)
            return 'too_large';
        elseif ($avatar->getSize() < 125)
            return 'too_small';

        // Move the avatar
        $originalFileName = getClientOriginalName();
        $moveFile = $avatar->move($_avatarPath, $originalFileName);
        if (!$moveFile)
            return 'upload_failed';

        return true;
    }
}