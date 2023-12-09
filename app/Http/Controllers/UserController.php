<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {

        // $users = User::orderBy('created_at', 'DESC') ->get();

        // return view('back.users.index', compact('users'));

        return $dataTable->render('back.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('user.index')->with('success', "User added successfully");

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
        $user = User::where('id', $id)->firstOrFail();
        return view('back.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::where('id', $id)->firstOrFail();

        $request->validate([
            'name' => 'required|max:256',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();
        
        if(Auth::user()->email === $user->email) {
            Auth::logout();
        }
        
        return redirect()->route('user.index')->with('success', "User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // return $request;

        $user = User::where('id', $request->id)->firstOrFail();

        $user->delete();

        // if(Auth::user()->email === $user->email) {
        //     Auth::logout();
        // }

        return redirect()->route('user.index')->with('success', "User removed successfully");
    }
}
