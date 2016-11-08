<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Print_;

class BaseClass extends Model
{
    public function getproperties($table)
    {
        $table = 'roles';
        $properties = array();

        $columnNames = Schema::getColumnListing($table);
        Print_r($columnNames);
        foreach ($columnNames as $property)
        {
            $type = DB::connection()->getDoctrineColumn($table, $property)->getType()->getName();
            array_push($properties, $property);
            array_push($properties, $type);
        }

        //Return the properties of the selected table.
        return $properties;
    }

}
