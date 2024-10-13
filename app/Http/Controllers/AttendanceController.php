<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
    $data = Attendance::all();

    if (Auth::guard('emp')->check()) {
        // akses halaman indexEmp
        $data = Attendance::orderBy('updated_at', 'desc')->get();
        return view("attendance.indexEmp")->with('data',$data);
    }
    else{
        return redirect()->route('emp.login');
    }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        //membuat presensi
        if (Auth::guard('emp')->check()) {
        $data = Attendance::orderBy('updated_at', 'desc')->get();
        return view("attendance.EmpCreate")->with('data',$data);

        }
        else{
            return redirect()->route('emp.login');
        }
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'id_employees' => 'required',
        'date' => 'required',
    ]);
    
    // Periksa apakah karyawan sudah absen pada tanggal yang sama sebelumnya
    $existingAttendance = Attendance::where('id_employees', $request->id_employees)
                                     ->whereDate('date', $request->date)
                                     ->exists();
    
    if ($existingAttendance) {
        return redirect()->back()->with('error', 'Employee has already attended for today.');
    }
    
    // Jika karyawan belum absen pada tanggal yang sama, simpan absen baru
    $att = new Attendance;
    $att->id_employees = $request->id_employees;
    $att->date = $request->date;
    $att->save();

    return redirect()->to('attendance/create')->with('success', 'Successfully did Attendance');
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
    public function update(Request $request, $id)
    {
        //
        $att = Attendance::findOrFail($request->id);
        $att->update($request->all());
         return back()->with('success','Successfully updated data');
        
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
