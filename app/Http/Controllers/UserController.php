<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index()
    {
        $employee = Employee::count();
        // dd($employee);
        $leave = Leave::count();
        $att = Attendance::count();
        return view("dashboard", compact('employee','leave','att'));
    }
   function Admin()
    {
        $employee = Employee::count();
        $leave = Leave::count();
        $att = Attendance::count();
        return view("dashboard", compact('employee','leave','att'));

    }
    function owner()
    {
        //
        $employee = Employee::count();
        $leave = Leave::count();
        $att = Attendance::count();
        return view("dashboard", compact('employee','leave','att'));
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
