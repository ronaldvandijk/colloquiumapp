<?php
/**
 * Colloquium Controller
 * @author       Ryan Hadders
 * @author       Sander van Kasteel
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColloquiaUpdateRequest;
use App\Models\Building;
use App\Models\City;
use App\Models\Colloquium;
use App\Models\ColloquiumType;
use App\Models\Language;
use App\Models\Room;
use App\Models\Theme;
use Illuminate\Http\Request;

/**
 * Class ColloquiumController
 * @package App\Http\Controllers\Admin
 */
class ColloquiumController extends Controller
{

    /**
     * Show an overview of all Colloquia
     * @param null $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($status = null)
    {

        switch ($status){
            case null:
                $colloquia = Colloquium::orderBy('start_date')->get();
                break;
            case 0:
                $colloquia = Colloquium::orderBy('start_date')->where('approved', 0)->get();
                break;
            case 1:
                $colloquia = Colloquium::orderBy('start_date')->where('approved', 1)->get();
                break;
            case 2:
                $colloquia = Colloquium::orderBy('start_date')->whereNull('approved')->get();
                break;
        }

        return view('admin.colloquia.overview', compact('colloquia', 'status'));
    }

    /**
     * Show a form to edit colloquia
     *
     * @param Colloquium $colloquium
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Colloquium $colloquium)
    {
        $themes = Theme::all();

        $langs = Language::all();
        $types = ColloquiumType::all();
        $cities = City::all();
        $buildings = Building::all();
        $rooms = Room::all();

        return view('admin.colloquia.edit', compact('colloquium', 'langs', 'types', 'themes', 'cities', 'buildings', 'rooms'));
    }

    /**
     * Update a colloquia
     *
     * @param ColloquiaUpdateRequest $request
     * @param Colloquium $colloquium
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ColloquiaUpdateRequest $request, Colloquium $colloquium)
    {

        $colloquium->start_date = str_replace('/', '-', $request->date_start ). " " . $request->time_start;
        $colloquium->end_date = str_replace('/', '-', $request->date_start ) . " " . ($request->time_end != "") ? $request->time_end : '00:00:00';
        $colloquium->update($request->input());

        return redirect(url('/planner/colloquia'));
    }

    /**
     * Remove a colloquium out of the database
     *
     * @param Colloquium $colloquium
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Colloquium $colloquium)
    {
        $colloquium->delete();
        return redirect(action("Admin\\ColloquiumController@index"));
    }

    /**
     * Approve a colloquim
     *
     * @param Colloquium $colloquium
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function approve(Colloquium $colloquium)
    {
        $colloquium->approved = 1;
        $colloquium->update();
        return redirect(url('/planner/colloquia'));
    }

    /**
     * Give the status "denied" to a colloquim
     *
     * @param Colloquium $colloquium
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deny(Colloquium $colloquium)
    {
        $colloquium->approved = 0;
        $colloquium->update();
        return redirect(url('/planner/colloquia'));
    }
}
