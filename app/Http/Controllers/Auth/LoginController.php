<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            
            'email'=>'required|email',
            'password'=>'required',

        ]);
        
        if (!auth()->attempt($request->only('email', 'password'),$request->remember)){
            return back()->with('status', 'invalid login details');
        } 
        //dd(auth()->user()->role->type);
        if (auth()->user()->role->type == '1') {
            return redirect()->route('admin');
        } else if(auth()->user()->role->type == '2'){
            return view('employee.index');
            
        }
        
        
    }

    
}


