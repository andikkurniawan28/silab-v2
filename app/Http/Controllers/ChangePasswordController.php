<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        User::where('name', auth()->user()->name)->update([
            'password' => bcrypt($request->password)
        ]);

        Log::writeLog('Authentication', 'Change Password' , auth()->user()->name);
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('login')->with('success', 'Password berhasil diganti, silahkan login kembali.');
    }
}
