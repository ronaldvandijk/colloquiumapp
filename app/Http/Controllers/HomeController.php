<?php

namespace App\Http\Controllers;

use App\Models\Colloquium;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'colloquia' => Colloquium::all()
        ]);
    }

    /**
     * This is the action which will display the TV screen with relevant colloquia for this location
     * @param null $location The location to filter on
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tv($location = null) {

        $query = Colloquium::getQuery();

        // If user filled in location then filter on it
        if(!is_null($location)) {
            $query->join('rooms', 'rooms.id', '=', 'colloquia.room_id')
                ->join('buildings', 'buildings.id', '=', 'rooms.building_id')
                ->join('locations', 'locations.id', '=', 'buildings.location_id')
                ->where('location.name','=',$location);
        };

        // Get upcoming colloquia first
        $query->whereDate('start_date', '>=', Carbon::now()->format('Y-m-d'));
        $query->orderBy('start_date', 'asc');

        // Return first 20 colloquia to view
        return view('tv', ['colloquia' => $query->take(20)->get()]);
    }
}
