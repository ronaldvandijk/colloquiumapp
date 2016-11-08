<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class BaseClass extends Model
{
    public function getproperties($table)
    {
        $properties = array();

        $columnNames = Schema::getColumnListing('$table');

        foreach ($columnNames as $property)
        {
            $type = DB::connection()->getDoctrineColumn('$table', '$property')->getType()->getName();
            array_push($properties, $property, $type);
        }

        //Return the properties of the selected table.
        return $properties;
    }

}
