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
        $colloquiumCollection = collect(Colloquium::selectRaw('*, DATE(start_date) as sort_date')->orderBy('start_date', 'asc')->get()->toArray())->groupBy('sort_date');
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
        return view('agenda.details', [
            'colloquium' => $colloquium,
        ]);
    }
}
