<?php
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public function overview($type)
    {
        $acceptedTypes = ['users', 'colloquia'];
        if (in_array($type, $acceptedTypes)) {
            return view('admin/overview', compact('type'));
        } else {
            return null;
        }
    }

}