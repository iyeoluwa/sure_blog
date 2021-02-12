<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:writer'])->except(['show']);
    }
    public function index(User $user){

        //this is to show the profile form
        return view('profile.index',[
            'user'=>$user
        ]);
    }

    public function store(Request $request,$id){
    #this is to store the profile details
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|max:255',
            'email'=>'email|required|max:255',
            'facebook'=>'nullable|max:255',
            'twitter'=>'nullable|max:255',
            'instagram'=>'nullable|max:255',
            'linkedin'=>'nullable|max:255',
            'personalinfo'=>'nullable',
        ]);
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $instagram = $request->input('instagram');
        $linkedin = $request->input('linkedin');
        $pInfo = $request->input('personalinfo');
        $user = User::find($id);
            $user->name = $request->name;
            $user->username =$request->username;
            $user->email = $request->email;
            $user->facebook = $facebook;
            $user->twitter = $twitter;
            $user->instagram = $instagram;
            $user->linkedin = $linkedin;
            $user->personal_info = $pInfo;
            $user->save();
            return redirect()->route('dashboard');

    }

    public function edit(){
        //this is to show the edit page
    }

    public function update(){
        //this is to store the updated info for the profile
    }

    public function show(User $user){
        //this is to show the writer profile from user perspective
        $posts = Post::where('user_id',$user->id)->get();

        return view('profile.show',[
            'user'=>$user,
            'posts'=>$posts
        ]);

    }
}
