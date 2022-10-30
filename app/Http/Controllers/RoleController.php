<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Log;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $stations = $this->serveStation();
        return view('role.index', compact('roles', 'stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add([
            'admin' => session('name'),
        ]);
        Role::create($request->all());
        Log::writeLog('Role', 'Create New Role', session('name'));
        return redirect()->back()->with('success', 'Role '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Role::where('id', $id)->update([
            'name' => $request->name,
        ]);
        Log::writeLog('Role', 'Update Role '.$request->name, session('name'));
        return redirect()->back()->with('success', 'Role '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        Log::writeLog('Role', 'Delete Role', session('name'));
        return redirect()->back()->with('success', 'Role has been deleted');
    }
}
