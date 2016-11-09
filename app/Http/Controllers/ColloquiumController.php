<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColloquiumController extends Controller
{

    /**
     *
     */
    public function index() {
        return view('user.AddColloquium');
    }
}
