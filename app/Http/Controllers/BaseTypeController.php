<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $model = new $this->modelClass;

        $data = [
            'properties' => $this->properties,
            'data' => $model->all(),
            'baseUrl' => $this->baseUrl,
            'controllerName' => $this->getClassNameController(),
        ];

        return $this->createView($this->overviewView, $data);

    }

    public function store(Request $request)
    {
        $model = new $this->modelClass;
        $model->create($request->input());

        return redirect(action($this->getClassNameController() . "@index"));
    }

    public function create()
    {
        $data = [
            'properties' => $this->properties,
            'baseUrl' => $this->baseUrl,
        ];

        return $this->createView($this->createView, $data);
    }

    public function edit($id)
    {
        $model = new $this->modelClass();

        $data = [
            'properties' => $this->properties,
            'data' => $this->findOrFail($id),
            'baseUrl' => $this->baseUrl,
        ];

        return $this->createView($this->editView, $data);

    }

    public function update(Request $request, $id)
    {
        $model = new $this->modelClass();
        $model = $model->findOrFail($request->input('id'));

        $model->update($request->input());

        return redirect(action($this->getClassNameController() . "@index"));
    }

    public function destroy($id)
    {
        $model = new $this->modelClass();
        $model = $model->findOrFail($id)->delete();

        return redirect(action($this->getClassNameController() . "@index"));
    }

    private function createView($viewName, $data = [])
    {
        try {
            return view($viewName, $data);
        } catch (InvalidArgumentException $e) {
            return view('base.' . $viewName, $data);
        }
    }

    private function getClassName($obj)
    {
        $array = explode("\\", get_class($obj));
        return $array[count($array) - 1];
    }

    private function getClassNameController()
    {
        $array = explode("\\", get_class($this));
        return $array[count($array) - 2] . "\\" . $array[count($array) - 1];
    }

    private function getProperties($tableName)
    {
        return Schema::getColumnListing($tableName);
    }

}
