<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        return view('admin.location.index', [
            'locations' => $locations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input data
        $this->validate($request,[
            'name' => 'required|unique:locations',
            'city' => 'required|numeric',
        ]);

        // Saving new location
        $location = new Location();
        $location->name = $request->input('name');
        $location->city_id = $request->input('city');
        $location->save();

        // Set success message for new request
        $request->session()->flash('success', 'The new location "'.$location->name.'" is successfully saved!');

        // Redirect to location overview
        return redirect('/admin/location');
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
        return view('admin.location.edit', ['location' => Location::findOrFail($id)]);
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
        // Validate input data
        $this->validate($request,[
            'name' => 'required|unique:locations',
            'city' => 'required|numeric',
        ]);

        // Saving new location
        $location = Location::findOrFail($id);
        $location->name = $request->input('name');
        $location->city_id = $request->input('city');
        $location->save();

        // Set success message for new request
        $request->session()->flash('success', 'The location "'.$location->name.'" is successfully saved!');

        // Redirect to location overview
        return redirect('/admin/location');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        // Set success message for new request
        request()->session()->flash('remove', 'The location "'.$location->name.'" is successfully deleted!');

        // Redirect to location overview
        return redirect('/admin/location');
    }
}
