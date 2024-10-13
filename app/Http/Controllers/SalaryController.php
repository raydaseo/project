<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 'owner') {
            $dtSal = Salary::orderBy('date', 'desc')->get(); // Urutkan berdasarkan tanggal secara menurun
            return view("salary.indexOwn")->with('dtSal', $dtSal);
        } elseif (Auth::guard('emp')->check()) {
            $dtSal = Salary::orderBy('date', 'desc')->get(); // Urutkan berdasarkan tanggal secara menurun
            return view("salary.index")->with('dtSal', $dtSal);
        } else{
            return redirect()->route('admin.login');
        }
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Employee::all();
        $dtSal = Salary::orderBy('updated_at', 'desc')->get();
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 'owner'){

            return view("salary.create", compact('data','dtSal'));
        }else{
            return redirect()->route('admin.login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //untuk mmbuat tabel agar isiannya harus diisi
        $request->validate([
            "id_employees" => "required",
            "salary" => "required",
            "bonus" => "required",
            "date" => "required|date",
            
        ]);

         // Periksa apakah karyawan sudah absen pada tanggal yang sama sebelumnya
         $existingSalary = Salary::where('id_employees', $request->id_employees)
                             ->whereYear('date', '=', date('Y', strtotime($request->date)))
                             ->whereMonth('date', '=', date('m', strtotime($request->date)))
                             ->first();

         if ($existingSalary) {
            return redirect()->back()->with('error', 'Employee has already got their salary.');
        }

        $salary = new Salary;
        $salary->id_employees= $request->id_employees;
        $salary->salary = $request->salary;
           $salary->bonus = $request->bonus;
           $salary->date = $request->date;
           $salary->total = $request->salary + $request->bonus;
           $salary->save();

           
           return redirect()->to('salary/create')->with('success','Successfully added data');
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
        
            $sal = Salary::findOrFail($request->id);
            $sal->update($request->all());
            return back()->with('success','Successfully updated Salary');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        //
        
            
            $salary->delete();
            return back()->with('success','Successfully deleted Salary');
        
    }
}
