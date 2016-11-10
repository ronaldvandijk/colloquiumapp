<?php
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\BaseTypeController;

class CityController extends BaseTypeController
{
    protected $modelClass = 'App\Models\City';

    protected $baseUrl = '/admin/city/';

    protected $overviewView = 'admin/city/list';


}