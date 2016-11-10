<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
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
        $this->className = strtolower($this->getClassName($model));
    }

    public function index()
    {
        $data = [
            'properties' => $this->properties,
            'data' => $this->modelClass::all(),
            'baseUrl' => $this->baseUrl,
            'controllerName' => $this->getClassNameController()
        ];

        return $this->createView($this->overviewView, $data);

    }

    public function store(Request $request)
    {
        $this->modelClass::create($request->input());

        return redirect(action($this->getClassNameController()."@index"));
    }

    public function create()
    {
        $data = [
            'properties' => $this->properties,
            'baseUrl' => $this->baseUrl
        ];

        return $this->createView($this->createView, $data);
    }

    public function edit($id)
    {

        $data = [
            'properties' => $this->properties,
            'data' => $this->modelClass::findOrFail($id),
            'baseUrl' => $this->baseUrl
        ];

        return $this->createView($this->editView, $data);

    }

    public function update(Request $request, $id)
    {
        $model = $this->modelClass::findOrFail($request->input('id'));

        $model->update($request->input());

        return redirect(action($this->getClassNameController()."@index"));
    }

    public function destroy($id)
    {
        $this->modelClass::findOrFail($id)->delete();
        return redirect(action($this->getClassNameController()."@index"));
    }


    private function createView($viewName, $data = [])
    {
        try {
            return view($viewName, $data);
        } catch(InvalidArgumentException $e) {
            return view('base.' . $viewName, $data);
        }
    }

    private function getClassName($obj)
    {
        $array = explode("\\", get_class($obj));
        return $array[count($array) -1];
    }

    private function getClassNameController()
    {
        $array = explode("\\", get_class($this));
        return $array[count($array) -2] . "\\" . $array[count($array) -1];
    }

    private function getProperties($tableName)
    {
        return Schema::getColumnListing($tableName);
    }

}