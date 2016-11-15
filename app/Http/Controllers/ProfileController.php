<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\SoftwareLanguages;
use Request;
use Auth;
use Image;

class ProfileController extends Controller
{
    public function profile(){
        return view('profile/profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user' => Auth::user()) );

    }

    private $_importantFields;
    private $_dir;

    /**
     * Allow the user to edit his/her account settings
     */
    public function settings() {
        $languages = SoftwareLanguages::all();
        return view('profile/settings')->with('languages', $languages);
    }

    /**
     * Save the user's settings
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(UpdateProfileRequest $request) {

        // If we have chosen a language, make sure it exists. If not, use English
        $language = SoftwareLanguages::get()->where('directory', $request['prefered_language']);
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
