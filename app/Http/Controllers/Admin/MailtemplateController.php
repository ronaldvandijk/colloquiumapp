<?php
/**
 * Controller for Mailtemplates. Supports overview, editing, creation, deletion.
 * @author       Sam Lakerveld
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseTypeController;

/**
 * Class MailtemplateController
 * @package App\Http\Controllers\Admin
 */
class MailtemplateController extends BaseTypeController
{
    /**
     * Model to use
     *
     * @var string
     */
    protected $modelClass = 'App\Models\Mailtemplate';

    /**
     * Base URL
     *
     * @var string
     */
    protected $baseUrl = '/admin/mailtemplates';

    /**
     * overview to load
     *
     * @var string
     */
    protected $overviewView = 'admin/mailtemplates/index';
    /**
     * Edit view to load
     *
     * @var string
     */
    protected $editView     = 'admin/mailtemplates/edit';
    /**
     * Create view to load
     *
     * @var string
     */
    protected $createView   = 'admin/mailtemplates/create';
}
