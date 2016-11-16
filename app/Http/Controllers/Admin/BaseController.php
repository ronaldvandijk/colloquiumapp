<?php
/**
 * BaseController
 */
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Colloquium;
use DateTime;
use Illuminate\Http\Request;

/**
 * Class BaseController
 * @package App\Http\Controllers\Admin
 */
class BaseController extends Controller
{

    /**
     * Overview
     *
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|null
     */
    public function overview($type)
    {
        $acceptedTypes = ['colloquia', 'locations', 'users'];
        if (in_array($type, $acceptedTypes)) {
            return view('admin/overview', compact('type'));
        } else {
            return null;
        }
    }

    /**
     * Create
     *
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($type)
    {
        return view('admin/create', compact('type'));
    }

    /**
     * Update
     *
     * @param $type
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($type, $id)
    {
        return view('admin/edit', compact('type', 'id'));
    }

    /**
     * Store
     *
     * @param $type
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($type, Request $request)
    {
        $colloquium = new Colloquium;
        $colloquium->title = $request->title;
        $colloquium->description = $request->description;
        $colloquium->user_id = 1;
        $colloquium->room_id = 1;
        $colloquium->start_date = new DateTime();
        $colloquium->end_date = new DateTime();
        $colloquium->type_id = 1;
        $colloquium->invite_email = 'admin@colloquium.app';
        $colloquium->company_image = '';
        $colloquium->company_url = '';
        $colloquium->approval = 0;
        $colloquium->language_id = 1;
        $colloquium->save();
        return back();
    }

}