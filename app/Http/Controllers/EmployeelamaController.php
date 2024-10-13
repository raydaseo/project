<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //index untuk menampilkan semua data di file index
    public function index()
    {
        //
        
        $data = Employee::all();
        return view("employee.index")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $data = Employee::all();
        return view("employee.create")->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     */

     //untuk memasukkan data baru ke database
     public function store(Request $request)
     {
         //untuk mmbuat tabel agar isiannya harus diisi
         $request->validate([
             
             "name" => "required",
             "position" => "required",
             "dob" => "required",
             "telephone" => "required",
             "username" => "required|username|unique:employees,username,NULL,id",
             "password" => "required",
            ]);
            $emp = Employee::create([

                'name' => $request->name,
                'position' => $request->position,
                'dob' => $request->dob,
                'telephone' => $request->telephone,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            
            return redirect()->to('employee/create')->with('success','Successfully added data');
        }

    /**
     * Display the specified resource.
     */
    //menampilkan detail data
    public function show(string $id)
    {
        //
        $item = Employee::find($id);
        return view('employees.show', compact('item'));

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
                "username" => "required|username|unique:employees,username," . $emp->id,
                "password" => "required",
            ]);
        
            // Update the employee record
            $emp->update([
                'name' => $request->name,
                'position' => $request->position,
                'dob' => $request->dob,
                'telephone' => $request->telephone,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
        return back()->with('success','Successfully updated data');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        // $emp = Employee::findOrFail($request->id);
        // $emp->delete($request->all());
        $employee->delete();
        return back()->with('success','Successfully deleted data');
    }
}