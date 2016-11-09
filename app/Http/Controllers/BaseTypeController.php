<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Schema;
use InvalidArgumentException;

class BaseTypeController extends Controller
{
    protected $modelClass = 'App\Models\BaseModel';

    protected $baseUrl = '';

    protected $properties = [];

    protected $className = '';

    protected $editView = 'edit';
    protected $createView = 'create';
    protected $overviewView = 'overview';

    public function __construct()
    {
        $model = new $this->modelClass;
        $this->properties = $this->getProperties($model->getTable());
        $this->className = $this->getClassName($model);
    }

    public function index()
    {
        // return a view

        $data = [
            'properties' => $this->properties,
            'data' => $this->modelClass::all(),
            'baseUrl' => $this->baseUrl
        ];

        return $this->createView($this->overviewView, $data);

    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function edit($id)
    {
        try {

            $data = [
                'properties' => $this->properties,
                'data' => $this->modelClass::where('id', $id)->firstOrFail(),
                'baseUrl' => $this->baseUrl
            ];

            return $this->createView($this->editView, $data);

        } catch(ModelNotFoundException $e) {
            return abort(404);
        }

    }

    public function update($model)
    {
        dd($model);
    }

    public function destory($model)
    {
        dd($model);
    }


    private function createView($viewName, $data = [])
    {
        try {
            return view($this->className . "." . $viewName, $data);
        } catch(InvalidArgumentException $e) {
            return view('base.' . $viewName, $data);
        }
    }

    private function getClassName($obj)
    {
        $array = explode("\\", get_class($obj));
        return strtolower($array[count($array) -1]);
    }

    private function getProperties($tableName)
    {
        return Schema::getColumnListing($tableName);
    }

}