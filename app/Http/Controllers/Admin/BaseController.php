<?php
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public function overview($type)
    {
        $acceptedTypes = ['colloquia', 'locations', 'users'];
        if (in_array($type, $acceptedTypes)) {
            return view('admin/overview', compact('type'));
        } else {
            return null;
        }
    }

    public function create($type) {
        return view('admin/create', compact('type'));
    }

    public function update($type, $id) {
        return view('admin/edit', compact('type', 'id'));
    }

}