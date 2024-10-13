<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Jika pengguna sudah login
    $data = Employee::all();
    if (Auth::guard('admin')->check()) {
        
        // Jika rolenya adalah 'admin'
        if (Auth::guard('admin')->user()->role == 'admin') {
            return view("employee.index")->with('data', $data);
        } 
        // Jika rolenya adalah 'owner'
        elseif (Auth::guard('admin')->user()->role == 'owner') {
            return view("employee.indexOwn")->with('data', $data);
        }
    } 
    // Jika pengguna belum login
    else {
        // Redirect ke halaman login
        return redirect()->route('admin.login');
    }
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Jika pengguna sudah login
    if (Auth::guard('admin')->check()) {
        $data = Employee::all();
        
        // Jika rolenya adalah 'admin'
        if (Auth::guard('admin')->user()->role == 'admin') {
            return view("employee.create")->with('data',$data);
        } 
        // Jika rolenya adalah 'owner'
        elseif (Auth::guard('admin')->user()->role == 'owner') {
            return redirect()->route('admin.login');
        }
    } 
    // Jika pengguna belum login
    else {
        // Redirect ke halaman login
        return redirect()->route('admin.login');
    }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi untuk membuat tabel agar isian wajib diisi
    $request->validate([
        "name" => "required|",
        "position" => "required|",
        "dob" => "required",
        "telephone" => "required|",
        "username" => "required",
        "password" => "required|unique:employees",
        "photo" => "nullable", // Tambahkan validasi opsional untuk photo
    ]);

    // Buat entri karyawan baru
    $emp = Employee::create([
        'name' => $request->name,
        'position' => $request->position,
        'dob' => $request->dob,
        'telephone' => $request->telephone,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'photo' => $request->photo ?? null, // Berikan nilai null jika photo tidak disediakan
    ]);

    return redirect()->route('employee.create')->with('success', 'Successfully added data');
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
        
            $emp = Employee::findOrFail($request->id);
        
            // Validate the request data
            $request->validate([
                "name" => "required",
                "position" => "required",
                "dob" => "required",
                "telephone" => "required",
                "username" => "required|unique:employees,username," . $emp->id,
            ]);
        
            // Update the employee record
            $emp->update([
                'name' => $request->name,
                'position' => $request->position,
                'dob' => $request->dob,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->password),
                'username' => $request->username,
            ]);
        return back()->with('success','Successfully updated data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return back()->with('success','Successfully deleted data');
    }
}
