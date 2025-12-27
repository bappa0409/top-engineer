<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
     public function show()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Profile photo upload
        if ($request->hasFile('profile_photo_path')) {
            $destination = public_path('upload/profile/' .$user->profile_photo_path);
            if (file_exists($destination)) {
                unlink($destination);
            }
            $request_file                   = $request->file('profile_photo_path');
            $extension                      = $request_file->extension();
            $filename                       = time() . rand(10, 1000) . '.' .$extension;
            $request_file->move(public_path('upload/profile'), $filename);
            $user->profile_photo_path            = $filename;
        }
        
        $user->save();

        return back()->with('success', 'Your profile updated successfully!');
    }

}
