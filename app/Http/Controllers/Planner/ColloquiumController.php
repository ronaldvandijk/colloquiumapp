<?php

namespace App\Http\Controllers\Planner;

use Illuminate\Http\Request;
use App\Models\Colloquium;
use App\Http\Controllers\Controller;

class ColloquiumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($approved = 2)
    {
        if ($approved == 'null') {
            $colloquia = Colloquium::whereNull('approved')
                ->orderBy('start_date', 'asc')
                ->get();
        } else if ($approved == 0 || $approved == 1) {
            $colloquia = Colloquium::where('approved', $approved)
                ->orderBy('start_date', 'asc')
                ->get();
        } else {
            $colloquia = Colloquium::orderBy('start_date', 'asc')
                ->get();
        }
        return view('planner.colloquia.index', compact('colloquia'));
    }

    /*public function update(Request $request)
    {
        Colloquium::where('id', $request->id)
            ->update(['approved' => $request->approved]);
        return back();
    }*/

    public function approve(Colloquium $colloquium, $approved)
    {
        $colloquium->approved = $approved;
        $colloquium->save();
        return back();
    }
}
