<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Employee::all();
        return view("profile.index")->with('data',$data);
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
    public function edit($id)
    {
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $emp = Employee::findOrFail($request->id);
        
        // Validate the request data
        $request->validate([
            "name" => "required",
            "position" => "required",
            "dob" => "required",
            "telephone" => "required",
            "username" => "required|unique:employees,username," . $emp->id,
            "photo" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);
        
        // Update the employee record
        $emp->name = $request->name;
        $emp->position = $request->position;
        $emp->dob = $request->dob;
        $emp->telephone = $request->telephone;
        $emp->username = $request->username;

        // If there is an uploaded photo file, save and update the photo file name in the employee data
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $image = time().'.'.$photo->getClientOriginalExtension();
            $request->photo->move(public_path('img/photoEmployee'), $image);

            // Delete the old photo if it exists
            $oldPhotoName = $emp->photo;
            if ($oldPhotoName && File::exists(public_path('img/photoEmployee').'/'.$oldPhotoName)) {
                File::delete(public_path('img/photoEmployee').'/'.$oldPhotoName);
            }

            $emp->photo = $image;
        }

        // Save the updated employee record
        $emp->save();

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
