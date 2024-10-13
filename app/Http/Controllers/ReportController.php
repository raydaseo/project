<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Salary;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index()
     {
         //
        $data = Employee::paginate(2);
        $att = Attendance::all();
        $dtSal = Salary::all();
        return view('report.recapfull', compact('data','att','dtSal'));
         
     }

     public function reportView()
     {
        $data = Employee::get();
        $att = Attendance::all();
        $liv = Leave::all();
        $dtSal = Salary::all();
        return view('report.report', compact('data','att','liv','dtSal'));

    }

    public function slip()
     {
        
        $dtSal = Salary::all();
        return view('report.slip', compact('dtSal'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
