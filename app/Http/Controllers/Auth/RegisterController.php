<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\AssignOp\Div;

class RegisterController extends Controller
{

    
    
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'user_type'=>'required',

        ]);
       

        $user = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);
        $user->role()->create([
            'user_id'=>$user->id,
            'type' => $request->user_type, //admin or employee
            
        ]);
        
        if($user){
            return redirect()->route('admin')->with('success','user successfully created');
        }else{
            return back()->with('error','user could not be created');
        }

        
    }

    public function update(Request $request, User $user){
        
         $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'user_type'=>'required',

        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'type'=>$request->user_type,
        ]);
        if($user){
            return back()->with('success','user successfully updated');
        }
        
    }




}
