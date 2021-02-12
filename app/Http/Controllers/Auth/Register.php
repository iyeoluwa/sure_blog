<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Permission;

class Register extends Controller
{

    public function __construct(){
        $this->middleware(['guest']);
    }
    //this controller is responsible for registerring the user

   public function index(){
       return view('auth.register');
   }

   public function store(Request $request){
        // valdate the user

        $this->validate($request,[
            'name'=>'max:255|required',
            'username'=>'max:255|required',
            'email'=>'max:255|email|required',
            'password'=>'required|confirmed'
        ]);// throw an exception if the criteria is wrong ...

       //create role instance....
       $user_role = Role::where('slug','user')->first();
       $user_permission = Permission::where('slug','read articles')->first();

        //next store the user after the role and permission instances have been formed.


            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->roles()->attach($user_role);
            $user->permissions()->attach($user_permission);

        //log the user in
        auth()->attempt($request->only('email','password'));
        //redirect
        return redirect()->route('dashboard');




    }
}
