<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Leave::orderBy('updated_at', 'desc')->orderBy('updated_at', 'desc')->get();
        return view("leave.indexAdm")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Leave::orderBy('updated_at', 'desc')->orderBy('updated_at', 'desc')->get();
        return view("leave.action")->with('data',$data);
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
    public function update(Request $request, string $id)
    {
        //
        $leave = Leave::findOrFail($id);
        // dd($leave);

        if (Auth::guard('admin')->user()->role === 'admin') {
        $leave->update(['status_admin'=> 'Accepted']);
        return back()->with('success','Successfully Accepted ');
        
        }
    }
    public function reject(Request $request, $id)
{
    $leave = Leave::findOrFail($request->id);

    if (Auth::guard('admin')->user()->role === 'admin') {
        // Memperbarui status_admin menjadi 'Rejected'
        $leave->update(['status_admin' => 'Rejected']);
        
        // Menyimpan data 'reason' yang dikirim dari form
        $leave->update(['reason' => $request->input('reason')]);

        return back()->with('success', 'Successfully Rejected');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
        $leave->delete();
        return back()->with('success','Successfully deleted data');;
    }

}
