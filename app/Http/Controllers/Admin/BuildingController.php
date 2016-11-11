<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\BaseTypeController;
use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Location;
use Illuminate\Validation\Rule;
use App\Http\Requests\BuildingRequest;

class BuildingController extends Controller
{

  //  protected $modelClass = 'App\Models\Building';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.building.list', ['buildings' => Building::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.building.create', ['locations' =>  Location::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildingRequest $request)
    {
        Building::create($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $building = Building::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:buildings,id,'.$building->id,
            'abbreviation' => 'required|unique:buildings,abbreviation,'.$building->abbreviation,
        ]);

        $building->name = $request->get('name');
        $building->abbreviation = $request->get('abbreviation');
        $building->location_id = $request->get('location_id');
        $building->save();

        return redirect()->action('Admin\BuildingController@index');
    }

    /**
     * Remove the specified resource from storage.
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
