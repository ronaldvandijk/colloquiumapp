<?php
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

class ColloquiumController extends Controller
{

    public function index(Request $request, $status = '')
    {
        if(!$status) {
            $colloquia = Colloquium::orderBy('start_date')->get();
        } else {
            $colloquia = Colloquium::where('approved', $status)->orderBy('start_date')->get();
        }

        return view('admin.colloquia.overview', compact('colloquia'));
    }

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

    public function update(ColloquiaUpdateRequest $request, Colloquium $colloquium)
    {
        $colloquium->start_date = str_replace('/', '-', $request->date_start ). " " . $request->time_start;
        $colloquium->end_date = str_replace('/', '-', $request->date_start ) . " " . $request->time_end;
        $colloquium->update($request->input());

        return redirect(url('/planner/colloquia'));
    }

    public function destroy(Colloquium $colloquium)
    {
        $colloquium->delete();
        return redirect(action("Admin\\ColloquiumController@index"));
    }

    public function approve(Colloquium $colloquium)
    {
        $colloquium->approved = 1;
        $colloquium->update();
        return redirect(url('/planner/colloquia'));
    }

    public function deny(Colloquium $colloquium)
    {
        $colloquium->approved = 0;
        $colloquium->update();
        return redirect(url('/planner/colloquia'));
    }
}
