<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions =Permission::all();
        
        return view('back.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $permission = new Permission();
        $permission->name = strtolower($request->name);

        $permission->save();

        return redirect()->route('permission.index');

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
        $permission =Permission::where('id', $id)->firstOrFail();
        return view('back.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $permission =Permission::where('id', $id)->firstOrFail();
        $permission->name = strtolower($request->name);

        $permission->save();

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $permission =Permission::where('id', $request->id)->firstOrFail();

        $permission->delete();

        return redirect()->route('permission.index');
    }
}
