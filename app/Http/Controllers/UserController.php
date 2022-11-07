<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Log;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::serveAll();
        $roles = Role::all();
        $stations = $this->serveStation();
        return view('user.index', compact('users', 'roles', 'stations'));
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
            'password' => md5($request->password),
            'admin' => Auth()->user()->name,
        ]);
        User::create($request->all());
        Log::writeLog('User', 'Create User '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'User '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users = User::serveAll();
        return view('user.show', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'role_id' => $request->role_id,
            // 'username' => $request->username,
            // 'password' => md5($request->password),
            'name' => $request->name,
            'is_active' => $request->is_active,
            'corrector' => Auth()->user()->name,
            'hmi_access' => $request->hmi_access,
            'entrance_access' => $request->entrance_access,
        ]);
        Log::writeLog('User', 'Edit User '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'User '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        Log::writeLog('User', 'Delete User', Auth()->user()->name);
        return redirect()->back()->with('success', 'User has been deleted');
    }
}
