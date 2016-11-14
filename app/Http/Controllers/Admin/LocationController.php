<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class LocationController
 *
 * @package App\Http\Controllers\Admin
 */
class LocationController extends Controller
{
    /**
     * Display a listing of locations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        return view('admin.locations.index', [
            'locations' => $locations
        ]);
    }

    /**
     * Show the form for creating a new location.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created location in storage.
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
     * Display the specified location.
     * Does not need to be implemented
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Does not need to be implemented
        throw new NotFoundHttpException();
    }

    /**
     * Show the form for editing the specified location.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        $inputValue = (!empty(request()->old('name'))) ? request()->old('name') : $location->name;
        return view('admin.locations.edit', ['location' => $location, 'inputValue' => $inputValue]);
    }

    /**
     * Update the specified location in storage.
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
     * Remove the specified location from storage.
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
