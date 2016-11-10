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
        $colloquiumCollection = collect(Colloquium::selectRaw('*, DATE(start_date) as start_date')->get()->toArray())->groupBy('start_date');
        dd($colloquiumCollection);
        return view('agenda.index', ['colloquiumCollection' => $colloquiumCollection]);
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
