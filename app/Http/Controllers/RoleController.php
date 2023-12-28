<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('back.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get(['name', 'id']);
        return view('back.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array'
        ]);

        $role = new Role();
        $role->name = strtolower($request->name);

        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::get(['name', 'id']);
        $role = Role::where('id', $id)->firstOrFail();
        return view('back.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array'
        ]);

        $role = Role::where('id', $id)->firstOrFail();
        $role->name = strtolower($request->name);

        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $role = Role::where('id', $request->id)->firstOrFail();

        $role->delete();

        return redirect()->route('role.index');
    }
}
