<?php
namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Room;

class RoomController extends Controller
{

    public function getRoomsBasedOnBuilding(Building $building)
    {
        return $building->rooms;
    }

}