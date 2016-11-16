<?php
/**
 * A simple controller for API usages for buildings
 * @author       Sander van Kasteel
 */
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\City;
use App\Models\Location;

/**
 * Class BuildingController
 * @package app\Http\Controllers\API
 */
class BuildingController extends Controller
{

    /**
     * Returns a JSON representation of all buildings based on a given city
     *
     * @param City $city
     * @return string JSON representation of all buildings based on a given city
     */
    public function getBuildingsBasedOnCity(City $city)
    {
        $location = Location::where('city_id', $city->id)->first();
        return Building::where('location_id', $location->id)->get()->toJson();
    }

}