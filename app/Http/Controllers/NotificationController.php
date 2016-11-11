<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    private $_userid;
    private $_notificationid;

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
    public static function push($notificationID) {

        // Guests can't receive notifications
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

    /**
     * Send an e-mail to the user
     * @return boolean
     */
    private function mail() {

        // send mail
    }

    /**
     * Add the notification to the database
     * @return boolean
     */
    private function pushtodb() {

        // add notification
    }
}