<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{   
    public function index(){
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function show(User $user){
       return view('admin.show', compact('user'));
    }

    public function edit(User $user){        
        return view('admin.edit', compact('user'));
    }


   

    public function delete(User $user){
        
        $user->delete();
        return back()->with('status', 'user successfully deleted');
    }

   
    
}
