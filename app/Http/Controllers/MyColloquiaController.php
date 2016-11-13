<?php
namespace App\Http\Controllers;

use App\Http\Requests\ColloquiumRequest;
use App\Http\Requests\RequestColloquiaRequest;
use App\Models\Colloquium;
use App\Models\ColloquiumType;
use App\Models\Language;
use App\Models\Theme;
use Auth;

class MyColloquiaController
{

    public function index()
    {
        return view('user.colloquium.overview', ['colloquia' => Auth::user()->colloquia]);
    }

    public function edit(ColloquiumRequest $request, Colloquium $colloquium)
    {
        return view('user.colloquium.edit', ['colloquium' => $colloquium, 'languages' => Language::all()]);
    }

    public function update(ColloquiumRequest $request, Colloquium $colloquium)
    {
        $colloquium->update($request->input());

        return redirect(action('MyColloquiaController@index'));
    }

    public function create()
    {
        return view('user.colloquium.create', ['languages' => Language::all(), 'themes' => Theme::all(), 'types' => ColloquiumType::all()]);
    }

    public function store(RequestColloquiaRequest $request)
    {
        $colloquium = new Colloquium();
        $colloquium->fill($request->input());
        $colloquium->user_id = Auth::user()->id;
        $colloquium->save();

        return redirect(action('MyColloquiaController@index'));
    }
}