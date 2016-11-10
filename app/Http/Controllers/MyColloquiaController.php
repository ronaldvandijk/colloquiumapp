<?php
namespace App\Http\Controllers;

use App\Http\Requests\ColloquiumRequest;
use App\Models\Colloquium;
use App\Models\Language;
use Auth;

class MyColloquiaController
{

    public function index()
    {
        $colloquia = Colloquium::where('user_id', Auth::user()->id)->get();

        return view('user.colloquium.overview', ['colloquia' => $colloquia]);
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
}