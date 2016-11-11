<?php

namespace App\Http\Controllers;

use App\Models\Colloquium;
use App\Models\ColloquiumType;
use App\Models\Language;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColloquiumController2 extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($approved = 2)
    {
        $colloquia = Colloquium::orderBy('start_date', 'asc')
            ->get();
        if (Auth::user()->role->name == 'Administrator') {
            return view('admin.colloquia.index', compact('colloquia'));
        } else if (Auth::user()->role->name == 'Planner') {
            if ($approved == 'null') {
                $colloquia = Colloquium::whereNull('approved')
                    ->orderBy('start_date', 'asc')
                    ->get();
            } else if ($approved == 0 || $approved == 1) {
                $colloquia = Colloquium::where('approved', $approved)
                    ->orderBy('start_date', 'asc')
                    ->get();
            }
            return view('planner.colloquia.index', compact('colloquia'));
        }
        return null;
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
        $rooms = Room::all();
        $startDate = explode(' ', $colloquium->start_date)[0];
        $startTime = explode(' ', $colloquium->end_date)[1];
        $endTime = explode(' ', $colloquium->end_date)[1];
        if (Auth::user()->hasRole("Administrator")) {
            $users = User::all();
            $langs = Language::all();
            $types = ColloquiumType::all();
            return view('planner.colloquia.edit', compact('colloquium', 'users', 'langs', 'types', 'date', 'time'));
        } else if (Auth::user()->hasRole("Planner")) {
            return view('planner.colloquia.edit', compact('colloquium', 'rooms', 'startDate', 'startTime', 'endDate', 'endTime'));
        }
    }

    public function update($id, Request $request)
    {
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
        $colloquium->update($request);
        //return redirect(action("ColloquiumController@index"));
    }

    public function delete(Colloquium $colloquium)
    {
        $colloquium->delete();
        return redirect(action("ColloquiumController@index"));
    }
}
