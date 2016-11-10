<?php

namespace App\Http\Controllers;

use App\Models\Colloquium;

class SearchController extends Controller
{
    /**
     * Displays a listing of the resource
     *
     * @return View
     */
    public function index()
    {
        $grouped = collect(Colloquium::all()->toArray())->groupBy('start_date');

        return view('agenda.index', ['colloquiumDates' => $grouped]);
    }

    /**
     * Displays the specified resource
     *
     * @param  Colloquium $colloquium
     * @return View
     */
    public function show(Colloquium $colloquium)
    {
        // return agenda details view
        return view('agenda.details', [
            'colloquium' => $colloquium,

        ]);
    }
}
