<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Requests;
use App\Models\Notification;
//use App\Role;
use Illuminate\Http\Request;
use App\Models\NavigationDashboard;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Dashboard\AdminController;

class NavigationController extends AdminController
{
    /**
     * Display a listing of navigation.
     *
     * @return Response
     */
    public function index()
    {

        save_resource_url();

        return $this->showIndex('settings.navigation.index');
    }

    /**
     * Show the form for creating a new navigation.
     *
     * @return Response
     */
    public function create()
    {
       $roles = \App\Role::getAllLists();
        $parents = NavigationDashboard::getAllLists();

        return $this->view('settings.navigation.add_edit')
            ->with('roles', $roles)
            ->with('parents', $parents);
    }

    /**
     * Store a newly created navigation in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, NavigationDashboard::$rules, NavigationDashboard::$messages);

        $inputs = $request->only([
            'icon',
            'title',
            'slug',
            'description',
            'help_index_title',
            'help_index_content',
            'help_create_title',
            'help_create_content',
            'help_edit_title',
            'help_edit_content',
            'parent_id',
            'url_parent_id'
        ]);
        $inputs['is_hidden'] = boolval($request->has('is_hidden'));
        $inputs['url_parent_id'] = ($inputs['url_parent_id'] == 0 ? $inputs['parent_id'] : $inputs['url_parent_id']);

        $row = $this->createEntry(NavigationDashboard::class, $inputs);

        if ($row) {
            $row->updateUrl()->save();
            //$row->roles()->attach(input('roles'));
        }

        return redirect_to_resource();
    }

    /**
     * Display the specified navigation.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $navigation = NavigationDashboard::findOrFail($id);

        return $this->view('settings.navigation.show')->with('item', $navigation);
    }

    /**
     * Show the form for editing the specified navigation.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
//        $roles = Role::getAllLists();
        $navigation = NavigationDashboard::findOrFail($id);

        return $this->view('settings.navigation.add_edit')
            ->with('item', $navigation)
//            ->with('roles', $roles)
            ->with('parents', NavigationDashboard::getAllLists());
    }

    /**
     * Update the specified navigation in storage.
     *
     * @param         $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, NavigationDashboard::$rules, NavigationDashboard::$messages);

        $inputs = $request->only([
            'icon',
            'title',
            'slug',
            'description',
            'help_index_title',
            'help_index_content',
            'help_create_title',
            'help_create_content',
            'help_edit_title',
            'help_edit_content',
            'parent_id',
            'url_parent_id'
        ]);
        $inputs['is_hidden'] = boolval($request->has('is_hidden'));

        $navigation = NavigationDashboard::findOrFail($id);
        $navigation = $this->updateEntry($navigation, $inputs);
        $navigation->updateUrl()->save();
        $navigation->roles()->sync(input('roles'));

        return redirect_to_resource();
    }

    /**
     * Remove the specified navigation from storage.
     *
     * @param         $id
     * @param Request $request
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $navigation = NavigationDashboard::findOrFail($id);
        $this->deleteEntry($navigation, $request);

        return redirect_to_resource();
    }

    /**
     * Return the data formatted for the table
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getTableData()
    {
        $items = $this->getTableRows();

        return Datatables::of($items)->editColumn('parent', function ($row) {
            return ($row->parent) ? $row->parent->title : '-';
        })->editColumn('is_hidden', function ($row) {
            return ($row->is_hidden == 1 ? 'Yes' : '');
        })->addColumn('action', function ($row) {
            return action_row($this->selectedNavigation->url, $row->id, $row->title,
                ['edit', 'delete']);
        })->make(true);
    }

    /**
     * Get the resource items
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getTableRows()
    {
        return NavigationDashboard::with('parent')->get();
    }
}
