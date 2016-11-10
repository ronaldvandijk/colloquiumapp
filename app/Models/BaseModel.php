<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Print_;
use Illuminate\Support\Facades\Schema;

class BaseModel extends Model
{
    public function getproperties($table)
    {
//        $table = 'roles';
//        $i = 0;
//        $properties = array();
//        $collnms = Schema::getColumnListing($table);
//        foreach ($collnms as $property)
//        {
//            $type = DB::connection()->getDoctrineColumn($table, $property)->getType()->getName();
//            array_push($properties, $property);
//            array_push($properties, $type);
//            $i++;
//        }
//
//        /*Return the properties of the selected table. And types as
//        array:4 [▼
//          0 => "id"
//          1 => "integer"
//          2 => "name"
//          3 => "string"*/
//
//        return $properties;
    }



}
