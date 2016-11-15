<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseTypeController;

/**
 * Controller for Mailtemplates. Supports overview, editing, creation, deletion.
 */
class MailtemplateController extends BaseTypeController
{
    protected $modelClass = 'App\Models\Mailtemplate';

    protected $baseUrl = '/admin/mailtemplates';

    // Views
    protected $overviewView = 'admin/mailtemplates/index';
    protected $editView     = 'admin/mailtemplates/edit';
    protected $createView   = 'admin/mailtemplates/create';
}
