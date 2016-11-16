<?php
/**
 * City Controller
 * @author       Sander van Kasteel
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseTypeController;
use App\Http\Requests\BuildingRequest;
use App\Http\Requests\CityRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

/**
 * Class CityController
 * @package App\Http\Controllers\Admin
 */
class CityController extends BaseTypeController
{
    /**
     * The model to load
     * @var string
     */
    protected $modelClass = 'App\Models\City';

    /**
     * The basic endpoint
     * @var string
     */
    protected $baseUrl = '/admin/city';

    /**
     * The filename of the overview view
     *
     * @var string
     */
    protected $overviewView = 'admin/city/index';
    /**
     * The filename of a edit view
     * @var string
     */
    protected $editView     = 'admin/city/edit';
    /**
     * The filename of a create view
     * @var string
     */
    protected $createView   = 'admin/city/create';

    /**
     * Removes a certain entry in the database
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            return parent::destroy($id);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                request()->session()->flash('custom_error', [
                    'message' => trans('admin/city.constraint_error'),
                    'type'    => 'danger'
                ]);
                return redirect('/admin/city');
            }
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|unique:cities,name,' . $id
        ]);
        return parent::update($request, $id);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:cities,name'
        ]);
        return parent::store($request);
    }
}