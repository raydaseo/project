<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Attendance::orderBy('updated_at', 'desc')->get();
        return view("attendance.indexAdm")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Attendance::orderBy('updated_at', 'desc')->get();
        return view("attendance.AdmDoAction")->with('data',$data);
        
        
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
        // untuk acc
        $att = Attendance::findOrFail($id);
        $att->update(['status' => 'Accepted']);
        return back()->with('success','Successfully Accepted ');
    }
    public function reject(Request $request, $id)
    {
        $att = Attendance::findOrFail($id);
        $att->update(['status' => 'Rejected']);
        return back()->with('success', 'Successfully Rejected');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(Attendance $attendance)
     {
         //
         $attendance->delete();
         return back()->with('success','Successfully deleted data');;
     }

   
  
}
