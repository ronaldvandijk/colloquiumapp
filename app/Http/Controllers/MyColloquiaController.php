<?php
namespace App\Http\Controllers;

use App\Http\Requests\ColloquiumRequest;
use App\Http\Requests\RequestColloquiaRequest;
use App\Models\Colloquium;
use App\Models\ColloquiumType;
use App\Models\Language;
use App\Models\Theme;
use Auth;

/**
 * Class MyColloquiaController
 * @package App\Http\Controllers
 */
class MyColloquiaController
{

    /**
     * Show an overview of all the colloquia that belongs to the current user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.colloquium.overview', ['colloquia' => Auth::user()->colloquia]);
    }

    /**
     * Allow the user to edit a colloquium
     *
     * @param ColloquiumRequest $request
     * @param Colloquium $colloquium
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ColloquiumRequest $request, Colloquium $colloquium)
    {
        return view('user.colloquium.edit', ['colloquium' => $colloquium, 'languages' => Language::all()]);
    }

    /**
     * Update a colloquium
     *
     * @param ColloquiumRequest $request
     * @param Colloquium $colloquium
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ColloquiumRequest $request, Colloquium $colloquium)
    {
        $colloquium->update($request->input());

        return redirect(action('MyColloquiaController@index'));
    }

    /**
     * Show the user a view in which he can create a collooquium
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.colloquium.create', ['languages' => Language::all(), 'themes' => Theme::all(), 'types' => ColloquiumType::all()]);
    }

    /**
     * Store a new colloquium in the database
     *
     * @param RequestColloquiaRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RequestColloquiaRequest $request)
    {
        $colloquium = new Colloquium();
        $colloquium->fill($request->input());
        $colloquium->user_id = Auth::user()->id;
        $colloquium->save();

        return redirect(action('MyColloquiaController@index'));
    }
}