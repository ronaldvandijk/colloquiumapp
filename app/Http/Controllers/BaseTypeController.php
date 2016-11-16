<?php
/**
 * BaseTypeController
 *
 * A simple controller you can extend for some basic CRUD functionality
 *
 * @author       Sander van Kasteel <info@sandervankasteel.nl>
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

/**
 * Class BaseTypeController
 * @package App\Http\Controllers
 */
abstract class BaseTypeController extends Controller
{
    /**
     * The model to use
     *
     * @var string
     */
    protected $modelClass = 'App\Models\BaseModel';

    /**
     * Base URL
     *
     * @var string
     */
    protected $baseUrl = '';

    /**
     * The properties that are used in the model
     *
     * @var array
     */
    protected $properties = [];

    /**
     * Classname of the childs of this Class
     *
     * @var string
     */
    protected $className = '';

    /**
     * Edit view
     *
     * @var string
     */
    protected $editView = 'base/edit';
    /**
     * Create view
     *
     * @var string
     */
    protected $createView = 'base/create';
    /**
     * Overview view
     *
     * @var string
     */
    protected $overviewView = 'base/overview';

    /**
     * BaseTypeController constructor.
     */
    public function __construct()
    {
        $model = new $this->modelClass;
        $this->properties = $this->getProperties($model->getTable());
        $this->className = strtolower($this->getClassName($model));
    }

    /**
     * Show an overview
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Store a certain instance to the database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = new $this->modelClass;
        $model->create($request->input());

        return redirect(action($this->getClassNameController() . "@index"));
    }

    /**
     * Show a create view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'properties' => $this->properties,
            'baseUrl' => $this->baseUrl,
        ];

        return $this->createView($this->createView, $data);
    }

    /**
     * Show an edit layout
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = new $this->modelClass();

        $data = [
            'properties' => $this->properties,
            'data' => $model->findOrFail($id),
            'baseUrl' => $this->baseUrl,
        ];

        return $this->createView($this->editView, $data);

    }

    /**
     * Update an certain instance of a object
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = new $this->modelClass();
        $model = $model->findOrFail($id);

        $model->update($request->input());

        return redirect(action($this->getClassNameController() . "@index"));
    }

    /**
     * Remove a certain instance of a object
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = new $this->modelClass();
        $model = $model->findOrFail($id)->delete();

        return redirect(action($this->getClassNameController() . "@index"));
    }

    /**
     * Create a view
     * if it fails, then load the base view
     *
     * @param $viewName
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function createView($viewName, $data = [])
    {
        try {
            return view($viewName, $data);
        } catch (InvalidArgumentException $e) {
            return view('base.' . $viewName, $data);
        }
    }

    /**
     * Get the full classname of an object
     *
     * @param $obj
     * @return mixed
     */
    private function getClassName($obj)
    {
        $array = explode("\\", get_class($obj));
        return $array[count($array) - 1];
    }

    /**
     * Get the name of this Controller
     *
     * @return string
     */
    private function getClassNameController()
    {
        $array = explode("\\", get_class($this));
        return $array[count($array) - 2] . "\\" . $array[count($array) - 1];
    }

    /**
     * Get the fields of the model
     *
     * @param $tableName
     * @return mixed
     */
    private function getProperties($tableName)
    {
        return Schema::getColumnListing($tableName);
    }

}
