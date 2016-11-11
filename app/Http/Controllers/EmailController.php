<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{

    private $_userid;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {
        // Do nothing
    }

    /**
     * Push a new notification to the database
     * @param int $notificationID The notification message ID
     * @return boolean
     */
    public static function push($emailId) {

        // Guests can't receive emails
        if (Auth::guest())
            return;

        // Does the user want an e-mail?
        elseif (Auth::user()->notification == 0)
            return;

        $this->_userid = Auth::user()->id;
        $this->_notificationid = $notificationID;

        // Send an e-mail
        if (Auth::user()->notification == 2 || Auth::user()->notification == 4)
            $this->mail($notificationID);

        // Add the notification to the database if the user wants a pretty Facebook-like notification box
        if (Auth::user()->notification == 3 || Auth::user()->notification == 4)
            $this->pushtodb($notificationID);

        return true;
    }
}