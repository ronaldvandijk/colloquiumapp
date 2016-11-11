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
    private $_languages;
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

        if (Auth::guest())
            redirect('/home');

        return view('user/profile');
    }

    /**
     * What languages do we have installed?
     * @return array
     */
    public function languages() {

        if (!empty($this->_languages))
            return true;

        $this->_languages = array();
        $this->_dir = __DIR__ . '/../../../resources/lang';

        // Get the languages from the database
        $dir = scandir($this->_dir);
        foreach ($dir as $directory)
            if (is_dir($this->_dir . '/' . $directory) && $directory != '.' && $directory != '..')
                $this->_languages[] = $directory;        
    }

    /**
     * Allow the user to edit his/her account settings
     * @return view
     */
    public function settings() {

        if (Auth::guest())
            redirect('/home');

        $this->languages();
        return view('user/settings')->with('languages', $this->_languages);
    }

    /**
     * Save the user's settings
     * @param UpdateProfileRequest $request
     * @return void
     */
    public function save(UpdateProfileRequest $request) {

        if (Auth::guest())
            redirect('/home');

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

        if (Auth::guest())
            redirect('/home');

        return view('user/avatar');
    }

    /**
     * Upload an avatar
     * @param file $file The file that should be uploaded
     * @return boolean
     */
    private function uploadAvatar($avatar) {

        if (Auth::guest())
            redirect('/home');

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