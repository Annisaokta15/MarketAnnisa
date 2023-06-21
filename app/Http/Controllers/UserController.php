<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    //

    function show(){
        return view('admin');
    
    }
    
    function tampil(){
    return view('dashboard');
    
    }
    function create(Request $req){
    
    $validate = $this->validate($req, [ 
    'name' => 'required',
    'email' => 'required',
    'password' => 'required',
    
    ] );
    
    $validate['password'] = bcrypt($req->password);
    
    User::create($validate);
    
    return redirect('login');
    }
    
    function login(){
    return view('login');
    }
    
    function auth(request $req){
        $scredentials = $req->only('email','password');
        
        if(Auth::attempt($scredentials)){
            return redirect('template2');
        }

        return redirect()->back();
    }

    // function auth(request $req){
    //     $scredentials = $req->only('email','password');
        
    //  } if(Auth::attempt($scredentials)){
    //         return redirect('pembeli');
    // if (Auth::user()->level === "admin"){
        //     return redirect('dashboard');
        // }else if (Auth::user()->level === "member"){
            //     return redirect('template');
    // }
    // }
    // function tampiluser(){
    //     $data['user'] = User::all();
    //     return view('template',$data);
    // }
    // function tampilauth(){
    //     $data['user'] = User::where('id', Auth::user()->id)->first();
    //     return view ('formuser');
    // }
    
    function logout(){
        Auth::logout();
        return redirect('login');
    }

}
