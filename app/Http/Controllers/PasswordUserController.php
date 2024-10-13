<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::all();
        if (Auth::guard('admin')->check()) {
        
            // Jika rolenya adalah 'admin'
            if (Auth::guard('admin')->user()->role == 'admin') {
                return view("password.changeUser")->with('data',$data);
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
        // Mengambil user berdasarkan $id
        $user = User::findOrFail($id);
        
        // Validasi data yang diterima
        $request->validate([
            "password" => "required",
            "newpassword" => "required|different:password",
        ]);

        // Memeriksa apakah password saat ini sesuai
        if (Hash::check($request->password, $user->password)) {
            // Enkripsi password baru
            $hashedPassword = bcrypt($request->newpassword);

            // Update password pengguna
            $user->password = $hashedPassword;
            $user->save();

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
