<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class BaseController extends Model
{
    public function getproperties($table)
    {
        $properties = array();

        $columnNames = Schema::getColumnListing('$table');

        foreach ($columnNames as $property)
        {
            array_push($properties, $property);
        }

        //Return the properties of the selected table.
        return $properties;
    }

}
