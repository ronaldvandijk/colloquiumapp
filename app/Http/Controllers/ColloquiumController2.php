<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\City;
use App\Models\Colloquium;
use App\Models\ColloquiumType;
use App\Models\Language;
use App\Models\Room;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColloquiumController2 extends Controller
{

    public function index(Request $request, $status = '')
    {
        // TODO check this view return view('planner.colloquia.index', compact('colloquia'));

        if(!$status) {
            $colloquia = Colloquium::orderBy('start_date')->get();
        } else {
            $colloquia = Colloquium::where('approved', $status)->orderBy('start_date')->get();
        }

        return view('admin.colloquia.index', compact('colloquia'));
    }

    public function create()
    {
        $users = User::all();
        $rooms = Room::all();
        $types = ColloquiumType::all();
        $langs = Language::all();
        if (Auth::user()->role->name == 'Administrator') {
            $prefix = 'admin';
        } else if (Auth::user()->id > 0) {
            $prefix = 'user';
        }
        return view($prefix . '.colloquia.index', compact(users, rooms, types, langs));
    }

    public function insert(Request $request)
    {
        $colloquium = new Colloquium();
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date|after:tomorrow',
            'end_date' => 'required|date|after:start_date',
            'type_id' => 'required|exists:colloquium_themes,id',
            'invite_email' => 'required',
            'company_image' => 'null',
            'company_url' => 'null',
            'language_id' => 'required|exists:languages,id',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'deleted_at' => 'null',
            'approved' => 'null',
        ]);
        $colloquium->fill($request);
        $colloquium->save();
        return redirect(action("ColloquiumController@index"));
    }

    public function edit($id)
    {
        $colloquium = Colloquium::where('id', $id)->get()->first();
        $themes = Theme::all();

        $langs = Language::all();
        $types = ColloquiumType::all();
        $cities = City::all();
        $buildings = Building::all();
        $rooms = Room::all();

        return view('admin.colloquia.edit', compact('colloquium', 'langs', 'types', 'themes', 'cities', 'buildings', 'rooms'));
    }

    public function update($id, Request $request)
    {
        dd($id);
        $colloquium = Colloquium::where('id', $id)->get()->first();
        /*$this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date|after:tomorrow',
            'end_date' => 'required|date|after:start_date',
            'type_id' => 'required|exists:colloquium_themes,id',
            'invite_email' => 'required',
            'company_image' => 'null',
            'company_url' => 'null',
            'language_id' => 'required|exists:languages,id',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'deleted_at' => 'null',
            'approved' => 'null',
        ]);*/
        $colloquium->start_date = $request->start_date . " " . $request->end_time;
        $colloquium->end_date = $request->end_date . " " . $request->end_time;
        $colloquium->room_id = $request->room_id;
        return back();
    }

    public function delete(Colloquium $colloquium)
    {
        $colloquium->delete();
        return redirect(action("ColloquiumController@index"));
    }
}
