<?php

namespace App\Http\Controllers;

use App\Models\Colloquium;
use Carbon\Carbon;
use DB;

class SearchController extends Controller
{
    /**
     * Displays a listing of the resource
     *
     * @return View
     */
    public function index()
    {
        $colloquiumCollection = collect(DB::table('colloquia')
                ->join('rooms', 'rooms.id', '=', 'colloquia.room_id')
                ->join('buildings', 'buildings.id', '=', 'rooms.building_id')
                ->join('locations', 'locations.id', '=', 'buildings.location_id')
                ->select(DB::raw('colloquia.*, DATE(start_date) as sort_date, rooms.name as room_name, buildings.name as building_name, buildings.abbreviation as building_abbreviation, locations.name as location_name'))
                ->orderBy('start_date')
                ->whereDate('start_date', '>', Carbon::now())
                ->get()->toArray())->groupBy('sort_date');

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
