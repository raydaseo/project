<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginAdmin()
    {
        //
        return view("login");
    }
    public function authAdmin(Request $request)
    {
        //Validasi form
        $credentials = $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        //cek login credentials
        $login = Auth::guard('admin')->attempt([
            'username' =>  $credentials['username'],
            'password'=>  $credentials['password'],
        ]);
        if($login){
            $request->session()->regenerate();
            if (Auth::guard('admin')->user()->role == 'admin' ) {
                return redirect()->intended('dashboard');
            } elseif ( Auth::guard('admin')->user()->role == 'owner' ) {
                return redirect()->intended('dashboardOwner');
        }
        }
        return back()->withErrors([
            'username' => 'Invalid Username',
            'password' => 'Invalid Password',
    ]);
    }


    public function loginEmp()
    {
        //
        return view("loginEmp");
    }

    public function authEmp(Request $request)
    {
        //Validasi form
        $credentials = $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        //cek login credentials
        $login = Auth::guard('emp')->attempt([
            'username' =>  $credentials['username'],
            'password'=>  $credentials['password'],
        ]);
        if($login){
            $request->session()->regenerate();
            if (Auth::guard('emp')->user()) {
                return redirect()->intended('dashboardEmp');
            }
        }
        return back()->withErrors([
        'username' => 'Invalid Username',
        'password' => 'Invalid Password',
    ]);
    }
    


    public function logout(Request $request)
    {
        if( Auth::guard('admin')->check() ) {
            Auth::guard('admin')->logout();
            $loginpage = 'admin.login';
    } elseif ( Auth::guard('owner')->check() ) {
            Auth::guard('owner')->logout();
            $loginpage = 'admin.login';
    } elseif ( Auth::guard('emp')->check() ) {
            Auth::guard('emp')->logout();
            $loginpage = 'emp.login';
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route( $loginpage );
    }






    public function dashboard(Request $request)
    {
        
    }
    /**
     * Show the form for creating a new resource.
     */
    // function loginProses(Request $request){
        
        // $request->validate([
        //     'username'=>'required',
        //     'password'=>'required'
        // ],[
        //     'username.required'=> 'username must be filled',
        //     'password.required'=> 'Password must be filled'
        // ]);
        // $infologin = [ 
        //     'username' => $request->username,
        //     'password'=> $request->password,
        // ];

        // //masuk sesuai hak akses yang dimiliki
        // if (Auth::guard("emp")->attempt($infologin)){
          
        //     return view('employee/dashboard');
        //     }
        
    // }

    /**
     * Store a newly created resource in storage.
     */
    
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