<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

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
            'locations' => $locations,
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
     * @param  LocationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        // Saving new location
        $location = Location::create($request->all());

        // Set success message for new request
        $request->session()->flash(
            'success',
            trans('admin/location.success_message', ['name' => $location->name])
        );

        // Redirect to location overview
        return redirect('/admin/locations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.location.edit', ['location' => Location::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LocationRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {
        // Saving new location
        $location = Location::findOrFail($id);
        $location->update($request->all());

        // Set success message for new request
        $request->session()->flash(
            'success',
            trans('admin/location.success_message', ['name' => $location->name])
        );

        // Redirect to location overview
        return redirect('/admin/locations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        // Set success message for new request
        request()->session()->flash(
            'success',
            trans('admin/location.delete_message', ['name' => $location->name])
        );

        // Redirect to location overview
        return redirect('/admin/locations');
    }
}
