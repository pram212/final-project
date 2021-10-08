<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class UploadProfileController extends Controller
{
    public function store (Request $request)
    {   
        $request->validate([
            'foto' => 'required|mimes:jpg,jpeg,png|max:1000',
        ]);
        
        // dapatkan file yang diupload
        $file = $request->file('foto');
        $name = "profile_photo".$request->id;
        $path = 'foto';
        $file->move($path, $name);
        
        $profile = Profile::find($request->id);

        $profile->update([
            'photo' => $name,
        ]);

        return redirect()->back()->with('sukses', 'Your profile photo has been updated');
    }
}
