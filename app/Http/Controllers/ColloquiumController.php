<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColloquiumController extends Controller
{
    public function index()
    {
        dd("BLA");
    }

    public function create() {
        $themes = Coll

        return view('user.AddColloquium');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
