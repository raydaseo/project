<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::all();
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 'admin') {
            return view("profile.index_user")->with('data',$data);
        
        } elseif (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 'owner') {
                return view("profile.index_own")->with('data',$data);
        }else{
            return redirect()->route('admin.login');
        
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request)
    {
        $user = User::findOrFail($request->id);

        // Validate the request data
        $request->validate([
            "name" => "required",
            "username" => "required",
            "photo" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        // Update the employee record
        $user->name = $request->name;
        $user->username = $request->username;

        // If there is an uploaded photo file, save and update the photo file name in the user data
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $image = time().'.'.$photo->getClientOriginalExtension();
            $request->photo->move(public_path('img/photoUser'), $image);
           

            // Delete the old photo if it exists
            $oldPhotoName = $user->photo;
            if ($oldPhotoName && File::exists(public_path('img/photoUser').'/'.$oldPhotoName)) {
                File::delete(public_path('img/photoUser').'/'.$oldPhotoName);
            }

            $user->photo = $image;
        }

        // Save the updated user record
        $user->save();

        return back()->with('success', 'Successfully updated Profile');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
