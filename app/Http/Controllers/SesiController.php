<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// class SesiController extends Controller
// {
//     //
//     function index(){
//         //akses halaman login user
//         return view("login");
//     }
//     //fungsi login didaftarkan di route
//     function login(Request $request){
//         $request->validate([
//             'username'=>'required',
//             'password'=>'required'
//         ],[
//             'username.required'=> 'Username must be filled',
//             'password.required'=> 'Password must be filled'
//         ]);
//         $infologin = [ 
//             'username' => $request->username,
//             'password'=> $request->password,
//         ];

//         //masuk sesuai hak akses yang dimiliki
//         if(Auth::attempt($infologin)){
//            if(Auth::user()->role == 'admin'){
//                 return redirect('user/admin');
//             }elseif(Auth::user()->role == 'owner'){
//                 return redirect('user/owner');
//             }else{
//                 return redirect("")->withErrors('Unmatched Username and Password')->withInput();;
//             }
//         }
//          //fungsi login didaftarkan di route
//     function loginEmp(Request $request){
//         $request->validate([
//             'username'=>'required',
//             'password'=>'required'
//         ],[
//             'username.required'=> 'username must be filled',
//             'password.required'=> 'Password must be filled'
//         ]);
//         $infologin = [ 
//             'username' => $request->username,
//             'password'=> $request->password,
//         ];
//     }

//     }
//     function logout(Request $request){
  
//             Auth::logout();
//             return redirect('');
            
//         }
        
//     function logoutEmp(Request $request){
            
                
//         Auth::logout();
//         return redirect('login/loginEmp');
        
//     }
        

// }