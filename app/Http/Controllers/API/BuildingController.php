<?php
namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\City;
use App\Models\Location;

class BuildingController extends Controller
{

    public function getBuildingsBasedOnCity(City $city)
    {
        $location = Location::where('city_id', $city->id)->first();
        return Building::where('location_id', $location->id)->get()->toJson();
    }

}