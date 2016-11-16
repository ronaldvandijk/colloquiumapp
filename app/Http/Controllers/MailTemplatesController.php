<?php
/**
 * MailTemplateController
 * @author       Marco
 */
namespace App\Http\Controllers;

use App\Models\Mailtemplate;

/**
 * Class MailTemplatesController
 * @package App\Http\Controllers
 */
class MailTemplatesController extends Controller
{
    /**
     * Show all email templates
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function overview(){
      $templates = MailTemplate::all();
      return view('mailtemplates.index', ['templates' => $templates]);
    }

    /**
     * Dummy function
     */
    public function send_email() {
        // Need subscription functionallity to continue mail templates.
    }
}
