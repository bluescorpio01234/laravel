<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function create(Request $request){
        // dd($request);
        $user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'message' => 'required|string|max:200',
            'password' => 'required|string|min:8|confirmed'

        ]);
        
        User::create($user);
        if (Auth::attempt(['email'=>$user['email'] ,'password'=>$user['password']])) {
            return redirect(route('user.index'));
    
            
               
            }
    }

    public function index(){
        $datas = User::all();
        return view('user.index',compact('datas'));
    }

    public function edit($id){
        $userDetails = User::where('id',$id)->first();
        // dd($userDetails);
        return view('user.edit', compact('userDetails'));
    }

    public function delete(User $id){
        $id->delete();
        return redirect()->back();

    }

    public function view(User $id){
        // dd($id);
        return view('user.view', compact('id'));
    }
    
}