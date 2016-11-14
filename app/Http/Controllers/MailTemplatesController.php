<?php

namespace App\Http\Controllers;

use App\Models\Mailtemplate;

class MailTemplatesController extends Controller
{
    public function overview(){
      $templates = mailtemplates::all();
      return view('mailtemplates.index', ['mailtemplate' => $templates]);
    }

    public function get_templates() {

    }
}
