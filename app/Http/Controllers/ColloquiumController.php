<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColloquiumController extends Controller
{
    public function index()
    {

    }

    public function create() {
        return view('user.AddColloquium');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
