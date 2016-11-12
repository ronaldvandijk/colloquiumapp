<?php
namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Room;

class RoomsController extends Controller
{

    public function getRoomsBasedOnBuilding(Building $building)
    {
        return Room::where('building_id', $building->id)->get()->toJson();
    }

}