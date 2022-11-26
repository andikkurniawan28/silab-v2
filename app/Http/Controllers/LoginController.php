<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $attempt = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
            'is_active' => 1,
        ]);

        if ($attempt)
        {
            $request->session()->regenerate();
            Log::writeLog('Authentication', 'Login' , auth()->user()->name);
            return redirect()->intended();
        }
        else
        {
            Log::writeLog('Authentication', 'Login Failed' , $request->username);
            return redirect('login')->with('error', 'Username / password wrong.');
        }
    }

    public function registerProcess(Request $request)
    {
        User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role_id' => 5,
            'admin' => $request->name,
        ]);
        Log::writeLog('Authentication', 'Register' , $request->name);
        return redirect('login')->with('success', 'Account has been registered successfully.');
    }

    public function logout(Request $request)
    {
        // Log::writeLog('Authentication', 'Logout', Auth()->user()->name);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
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
        // Log::writeLog('Authentication', 'Logout', Auth()->user()->name);
        session()->flush();
        return redirect('login_hmi');
    }
}
