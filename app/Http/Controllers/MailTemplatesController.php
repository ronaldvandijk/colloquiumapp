<?php
/*
 * Mailtemplates Controller
/*
 */
namespace App\Http\Controllers;

use App\Models\Mailtemplate;

class MailTemplatesController extends Controller
{
    public function overview(){
      $templates = MailTemplate::all();
      return view('mailtemplates.index', ['templates' => $templates]);
    }

    public function send_email() {
        // Need subscription functionallity to continue mail templates.
    }
}
