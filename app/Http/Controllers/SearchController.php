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
        // Instantiate an array to store the properly sorted Colloquiums
        $colloquiumDates = array();

        // Retrieve all the Colloquiums
        $colloquiums = Colloquium::all();

        // For each colloquim, push its date formated as 'Y-m-d' as a key in the $colloquiumDates assosciative array
        foreach ($colloquiums as $colloquium) {
            $colloquiumDates[strval(date('Y-m-d', strtotime($colloquium->start_date)))] = [];
        }

        // Go through the $colloquiumDates and retrieve all colloquiums with the same start_date as the array key
        foreach ($colloquiumDates as $date => $colloquium) {
            $colloquiums = DB::select('select colloquia.*, rooms.name from colloquia , rooms where colloquia.room_id = rooms.id AND DATE(colloquia.start_date) = ?', [$date]);
            // pus the retrieved collquiums to the associated key in the $colloquiumDates array
            $colloquiumDates[$date] = $colloquiums;
        } 

        // Sort the $colloquiumDates keys 
        ksort($colloquiumDates);

        // Return agenda index view
        return view('agenda.index', ['colloquiumDates' => $colloquiumDates]);
    }

    public function details($id)
    {
        // Retrieve the colloquium with the matching $id
        $colloquium = Colloquium::find($id);

        // Retrieve the user which matches the $colloquium->id
        $user = User::find($colloquium->user_id);

        // Retrieve the colloquium type that matches the $colloquium->tyoe_id
        $type = ColloquiumType::find($colloquium->type_id);

        // Retrieve the room that matches the $colloquium->room_id
        $room = Room::find($colloquium->room_id);

        // return agenda details view
        return view('agenda.details', ['colloquium' => $colloquium, 'user' => $user, 'type' => $type, 'room' => $room]);
    }
}
