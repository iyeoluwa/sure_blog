<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{

    public function __construct(){
        $this->middleware(['guest']);
    }

    /**
     * this function is to display the login page of the website ...
     */
  public function index(){
        return view('auth.login');
    }

    /**
     * This function is responsible for the Login processing of the users
     * It validates the inputs,
     * checks if the user exists,
     * logs the user in.
     */
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);//throw an exception if it is wrong

        //check if the user exists
        if (!auth()->attempt($request->only('email','password'),$request->remember)) {
            return back()->with("Invalid login details");
        }else{
            return redirect()->route('home');
        }
    }


}
