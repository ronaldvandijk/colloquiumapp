<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseTypeController;

class MailtemplateController extends BaseTypeController
{
    protected $modelClass = 'App\Models\Mailtemplate';

    protected $baseUrl = '/admin/mailtemplates';

    // Views
    protected $overviewView = 'admin/mailtemplates/index';
    protected $editView     = 'admin/mailtemplates/edit';
    protected $createView   = 'admin/mailtemplates/create';
}
