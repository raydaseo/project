<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
            //
            $data = Employee::all();
            $dtLev = Leave::orderBy('updated_at', 'desc')->orderBy('updated_at', 'desc')->get();
            return view("leave.EmpDoReq", compact('data','dtLev'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //untuk membuat tabel agar isiannya harus diisi
        $request->validate([
            "id_employees" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "description" => "required",
            "responsible_person" => "required",


           ]);
           
           $leave = new Leave;
           $leave->id_employees = $request->id_employees;
           $leave->start_date = $request->start_date;
           $leave->end_date = $request->end_date;
           $leave->description = $request->description;
           $leave->responsible_person = $request->responsible_person;
           $leave->save();

           return redirect()->to('leaveReq/create')->with('success','Successfully do Request Leave');
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
    
        $lev = Leave::findOrFail($request->id);
        $lev->update($request->all());
        return back()->with('success','Successfully updated data');;
    
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        
    }
}
