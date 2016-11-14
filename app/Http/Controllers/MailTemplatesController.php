<?php

namespace App\Http\Controllers;

use App\Models\Mailtemplate;
use Illuminate\Support\Facades\DB;

class MailTemplatesController extends Controller
{
    public function overview(){
      $templates = DB::table('mailtemplates')->get();
      return view('mailtemplates.index', ['templates' => $templates]);
    }

    public function send_email() {
        // Need subscription functionallity to continue mail templates.
    }
}
