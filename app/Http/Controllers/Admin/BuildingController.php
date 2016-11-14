<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\BaseTypeController;
use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Location;
use Illuminate\Validation\Rule;
use App\Http\Requests\BuildingRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BuildingController extends Controller
{

  //  protected $modelClass = 'App\Models\Building';


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Displays the view list of all buildings with the appropriate action buttons: edit and delete.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.building.list', ['buildings' => Building::all()]);
    }

    /**
     * Shows the form for creating a new building.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.building.create', ['locations' =>  Location::all()]);
    }

    /**
     * Stores the newly created building
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildingRequest $request)
    {
        try {
            Building::create($request->all());
        } catch (QueryException $exception) {
            if ($exception->getCode() == 23000) {
                $request->session()->flash('uniqueError', '{{ trans(\'admin/building/create.not-unique\') }}');
                return redirect()->action('Admin\BuildingController@create');
            }
        }
        return view('admin.building.list', ['buildings' => Building::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // we don't display a single building, doesn't require implementation.
        throw new NotFoundHttpException();
    }

    /**
     * Show the form for editing the building (identified by $id)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.building.edit', [
            'building' => Building::findOrFail($id),
            'locations' => Location::all(),
        ]);
    }

    /**
     * Updates the building after the editing form is submitted.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BuildingRequest $request, $id)
    {
        try {
            $building = Building::findOrFail($id);
            $building->name = $request->get('name');
            $building->abbreviation = $request->get('abbreviation');
            $building->location_id = $request->get('location_id');
            $building->save();
        }catch (QueryException $exception) {
            if ($exception->getCode() == 23000) {
                $request->session()->flash('error', '{{ trans(\'admin/building/create.not-unique\') }}');
                //redirect()->back();
            }
        }
        return redirect()->action('Admin\BuildingController@index');
    }

    /**
     * Remove the specified building from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Building::findOrFail($id)->delete();
        return redirect()->back();
    }
}
