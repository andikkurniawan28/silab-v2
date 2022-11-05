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

    public function loginHmi()
    {
        return view('auth.login_hmi');
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
            return redirect()->intended();    
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

    public function loginHmiProccess(Request $request)
    {
        $users = User::where('hmi_access', $request->hmi_access);
        if($users->count() == 1)
        {
            foreach($users->get() as $user)
            {
                session()->put('name', $user->name);
                session()->put('role', $user->role_id);
                session()->put('is_login', 1);
            }
            Log::writeLog('Authentication', 'Login' , $user->name);
            return redirect('barcode_samples');    
        }
        else
        {
            Log::writeLog('Authentication', 'Login failed' , $request->hmi_access);
            return redirect('login_hmi')->with('error', 'ID Card is unidentified.');
        }
    }

    public function logoutHmi()
    {
        Log::writeLog('Authentication', 'Logout', session('name'));
        session()->flush();
        return redirect('login_hmi');
    }
}
