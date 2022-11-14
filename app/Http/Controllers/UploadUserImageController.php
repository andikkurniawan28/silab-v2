<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class UploadUserImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $image = $request->file('image');
        $image->store('image', 'public');
        User::where('name', auth()->user()->name)->update([
            'image' => $image->hashName(),
        ]);
        Log::writeLog('Authentication', 'Upload Image' , auth()->user()->name);
        return redirect()->back()->with('success', 'Foto Profil berhasil diupload');
    }
}
