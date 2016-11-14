<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use \App\Http\Requests\UpdateProfileRequest;
use \Auth;
use Illuminate\Foundation\Auth\User;

class ProfileController extends Controller
{

    private $_importantFields;
    private $_dir;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {
        // Do nothing
    }

    /**
     * Show the user's profile
     * @return view
     */
    public function index() {
        return view('user/profile');
    }

    /**
     * Allow the user to edit his/her account settings
     * @return view
     */
    public function settings() {
        $languages = \DB::table('software_languages')->get();
        return view('user/settings')->with('languages', $languages);
    }

    /**
     * Save the user's settings
     * @param UpdateProfileRequest $request
     * @return void
     */
    public function save(UpdateProfileRequest $request) {

        // If we have chosen a language, make sure it exists. If not, use English
        $language = \DB::table('software_languages')->get();
        if (count($language) == 0)
            $_POST['prefered_language'] = 'en';

        // Validate the form
        $user = Auth::user();
        $user->update($request->input());

        return redirect('/profile/settings');
    }

    /**
     * The avatar uploading page
     * @return view
     */
    public function avatar() {
        return view('user/avatar');
    }

    /**
     * Upload an avatar
     * @param file $file The file that should be uploaded
     * @return boolean
     */
    private function uploadAvatar($avatar) {
        /*
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

        return true;*/
    } 
}