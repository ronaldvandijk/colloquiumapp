<?php
/**
 * Profile Controller
 *
 * @author       Robert
 */

namespace App\Http\Controllers;

use \App\Http\Requests\UpdateProfileRequest;
use \Auth;
use App\Models\SoftwareLanguages;
use View;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{

    /**
     * Directory to upload?
     * @var
     */
    private $_dir;

    /**
     * Show the user's profile
     * @return View
     */
    public function index() {
        return view('user/profile');
    }

    /**
     * Allow the user to edit his/her account settings
     * @return View
     */
    public function settings() {
        $languages = SoftwareLanguages::all();
        return view('user/settings', ['languages' => $languages]);
    }

    /**
     * Save the user's settings
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(UpdateProfileRequest $request) {

        // If we have chosen a language, make sure it exists. If not, use English
        $language = SoftwareLanguages::where('directory', $request['prefered_language'])->get();
        if (count($language) == 0)
            $request['prefered_language'] = 'en';

        // Update the user's profile
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

}