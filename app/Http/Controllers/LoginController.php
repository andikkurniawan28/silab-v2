<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $users = User::checkUserIsExisted($request->username, md5($request->password));
        if($users->count() == 1)
        {
            foreach($users->get() as $user)
            {
                session()->put('name', $user->name);
                session()->put('role', $user->role_id);
                session()->put('is_login', 1);
            }
            Log::writeLog('Authentication', 'Login' , $user->name);
            return redirect('/');    
        }
        else
        {
            Log::writeLog('Authentication', 'Login failed' , $request->username);
            return redirect('login')->with('error', 'Username / password wrong.');
        }
    }

    public function registerProcess(Request $request)
    {
        User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => md5($request->password),
            'role_id' => 5,
            'admin' => $request->name,
        ]);
        Log::writeLog('Authentication', 'Register' , $request->name);
        return redirect('login')->with('success', 'Account has been registered successfully.');
    }

    public function logout()
    {
        Log::writeLog('Authentication', 'Logout', session('name'));
        session()->flush();
        return redirect('/');
    }
}
