<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colloquium;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Colloquium::search($request->input('Searchbar'))
            ->with(["user", "room.building.location"]);
        if($request->has('locations')){
            $query->whereIn("room.building.location.name", $request->input('Locations'));
        }
        if($request->has('Date')){
            $query->whereDate("start_date",'=', date('Y-m-d',strtotime($request->input('Date'))));
        }

        $colloquia = $query->get();

        return view('search.index', ['colloquiumCollectionDate' => $colloquia]);
    }
}
