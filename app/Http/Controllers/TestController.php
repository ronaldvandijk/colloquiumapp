<?php
namespace App\Http\Controllers;

use App\BaseModel;
use App\Models\Room;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\BaseTypeController;

class TestController extends BaseTypeController
{
    public function overview()
    {
        $table = "roles";
        $rooms = new Room();
        dd($rooms->getproperties($table));
    }
}
