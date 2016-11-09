<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colloquium;
use Illuminate\Support\Facades\DB;

class colloquiumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     *
     */
    public function index()
    {
        return view('user.AddColloquium');
    }

    public function plannerView(Request $request)
    {
        if ($request->approval != null) {
            $colloquia = Colloquium::where('approval', $request->approval)->orderBy('start_date', 'asc')->get();
        } else {
            $colloquia = Colloquium::orderBy('start_date', 'asc')->get();
        }
        return view('user.colloquiaPlanner', compact('colloquia'));
    }

    public function update(Request $request) {
        DB::table('colloquia')->where('id', $request->id)->update(['approval' => $request->approval]);
        return back();
    }
}
