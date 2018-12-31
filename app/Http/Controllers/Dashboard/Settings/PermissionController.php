<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Permission;
use Redirect;
use App\Http\Requests;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\AdminController;

class PermissionController extends AdminController
{
    /**
     * Display a listing of role.
     *
     * @return Response
     */
    public function index()
    {
        save_resource_url();

        return $this->view('settings.permissions.index')->with('items', Permission::all());
    }

    /**
     * Show the form for creating a new role.
     *
     * @return Response
     */
    public function create()
    {
        return $this->view('settings.permissions.add_edit');
    }

    /**
     * Store a newly created role in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Permission::$rules, Permission::$messages);

        $this->createEntry(Permission::class, $request->all());

        return redirect_to_resource();
    }

    /**
     * Display the specified role.
     *
     * @param Permission $permission
     * @return Response
     */
    public function show(Permission $permission)
    {
        return $this->view('settings.permissions.show')->with('item', $permission);
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param Permission $permission
     * @return Response
     */
    public function edit(Permission $permission)
    {
        return $this->view('settings.permissions.add_edit')->with('item', $permission);
    }

    /**
     * Update the specified role in storage.
     *
     * @param Permission    $permission
     * @param Request $request
     * @return Response
     */
    public function update(Permission $permission, Request $request)
    {
        $this->validate($request, Permission::$rules, Permission::$messages);

        $this->updateEntry($permission, $request->all());

        return redirect_to_resource();
    }

    /**
     * Remove the specified role from storage.
     *
     * @param Permission    $permission
     * @param Request $request
     * @return Response
     */
    public function destroy(Permission $permission, Request $request)
    {
        $this->deleteEntry($permission, $request);

        return redirect_to_resource();
    }
}
