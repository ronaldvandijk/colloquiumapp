<?php
/**
 * HomeController
 *
 * @author       Sander van Kasteel
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package app\Http\Controllers\Admin
 */
class HomeController extends Controller
{

    /**
     * Show a dashboard view to the admin user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin/dashboard');
    }

}