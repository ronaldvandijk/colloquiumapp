<?php

namespace App\Http\Controllers\Planner;

use App\Models\Colloquium;
use App\Http\Controllers\Controller;

class ColloquiumController extends Controller
{
    /**
     * Create a new controller instance.
     *
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

    public function update($approved = 2)
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
        return view('planner.colloquia.edit', compact('colloquia'));
    }

    public function approve(Colloquium $colloquium, $approved)
    {
        $colloquium->approved = $approved;
        $colloquium->save();
        return back();
    }

    public function destroy(Colloquium $colloquium)
    {
        $colloquium->softDeletes();
        return back();
    }
}
