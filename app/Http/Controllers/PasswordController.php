<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Employee::all();
        return view("password.changeEmp")->with('data',$data);
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
    public function update(Request $request, string $id)
    {
        // Get the employee based on $id
        $employee = Employee::findOrFail($id);
        
        // Validate the received data
        $request->validate([
            "password" => "required",
            "newpassword" => "required|different:password",
        ]);

        // Check if the current password is correct
        if (Hash::check($request->password, $employee->password)) {
            // Encrypt the new password
            $hashedPassword = bcrypt($request->newpassword);

            // Update the employee's password
            $employee->password = $hashedPassword;
            $employee->save();

            return back()->with('success', 'Password successfully updated');
        } else {
            return back()->withErrors(['password' => 'The current password is incorrect.'])->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
