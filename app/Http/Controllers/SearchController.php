<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\City;
use App\Models\Colloquium;
use App\Models\ColloquiumType;
use App\Models\Invitee;
use App\Models\Language;
use App\Models\Location;
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

        // Retrieve the language matching the $colloquium->language_id
        $language = Language::find($colloquium->language_id);

        // Retrieve the room where the room_id matches
        $room = Room::find($colloquium->room_id);

        // Retrieve building where building_id matches
        $building = Building::find($room->building_id);

        // Retrive location where location_id matches
        $location = Location::find($building->location_id);

        // Retrieve the city where the $location->city_id matches
        $city = City::find($location->city_id);

        // Retrieve the invitees where the $collquium_id matches
        $invitees = Invitee::where('colloquium_id', '=', $colloquium->id)->get();
        // Get the amount of invitees
        $interested = count($invitees);

        // return agenda details view
        return view('agenda.details', [
            'colloquium' => $colloquium,
            'user'       => $user,
            'type'       => $type,
            'room'       => $room,
            'language'   => $language,
            'location'   => $location,
            'city'       => $city,
            'interested' => $interested,
            'room'       => $room,
            'building'   => $building
        ]);
    }
}
