<?php
/**
 * Profile Controller
 *
 * @author       Robert / Moubarak Hayal
 */

namespace App\Http\Controllers;

use \App\Http\Requests\UpdateProfileRequest;
use \Auth;
use App\Models\SoftwareLanguages;
use View;
use Illuminate\Http\Request;
use Image;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    public function profile(){
        return view('profile/profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/avatars/' . $filename ) );

            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }

        return view('profile/profile', array('user' => Auth::user()) );

    }

    private $_importantFields;
    /**
     * Directory to upload?
     * @var
     */
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
     * @return View
     */
    public function index() {
        return view('profile/profile');
    }

    /**
     * Allow the user to edit his/her account settings
     * @return View
     */
    public function settings() {
        $languages = SoftwareLanguages::all();
        return view('profile/settings', ['languages' => $languages]);
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
        return view('profile/avatar');
    }

}