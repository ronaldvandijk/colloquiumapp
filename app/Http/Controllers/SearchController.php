<?php

namespace App\Http\Controllers;

use App\Models\Colloquium;
use App\Models\ColloquiumType;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $colloquiumDates = array();
        $colloquiums = Colloquium::all();

        foreach ($colloquiums as $colloquium) {
            $colloquiumDates[strval(date('Y-m-d', strtotime($colloquium->start_date)))] = [];
        }

        foreach ($colloquiumDates as $date => $colloquium) {
            $colloquiums = DB::select('select colloquia.*, rooms.name from colloquia , rooms where colloquia.room_id = rooms.id AND DATE(colloquia.start_date) = ?', [$date]);
            $colloquiumDates[$date] = $colloquiums;
        } 

        return view('mobile.index', ['colloquiumDates' => $colloquiumDates]);
    }

    public function details($id)
    {
        $colloquium = Colloquium::find($id);
        $user = User::find($colloquium->user_id);
        $type = ColloquiumType::find($colloquium->type_id);
        $room = Room::find($colloquium->room_id);

        return view('mobile.details', ['colloquium' => $colloquium, 'user' => $user, 'type' => $type, 'room' => $room]);
    }
}
