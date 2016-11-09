<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Session;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.theme.overview', [
            'themes' => Theme::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Theme::RULES);

        $theme = new Theme();
        $theme->name = $request->get('name');
        $theme->save();

        return redirect()->action('Admin\ThemeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.theme.view', ['theme' => Theme::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.theme.edit', [
            'theme' => Theme::findOrFail($id),
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
        $this->validate($request, Theme::RULES);
        try {
            $theme = Theme::findOrFail($id);
            $theme->name = $request['name'];
            $theme->save();
            Session::set('message', 'Theme updated');
        } catch (ModelNotFoundException $e) {
            Session::set('message', 'Theme not found');
        }

        return redirect()->action('Admin\ThemeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Theme::findOrFail($id)->delete();
            Session::flash('message', 'Successfully deleted the theme!');
        } catch (ModelNotFoundException $e) {
            // mmm... yeah just nothing
        }

        return redirect()->action('Admin\ThemeController@index');
    }
}
