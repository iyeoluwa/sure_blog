<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Mtownsend\ReadTime\ReadTime;


class UserPostController extends Controller
{
    public function index(User $user,Post $post){
        $minutes = read_time($post->content);
        $minute = explode(' ',$minutes->get());
        $numberofminutes = intval($minute[0])/1.5;
        $totalminutes = round($numberofminutes);
        $expires = now()->addMinutes($totalminutes);


        views($post)->cooldown($expires)->record();
        $count = views($post)->count();


        $query = Post::where(['user_id'=>$post->user_id])->where('id','!=',$post->id)->take(4)->get();




        return view('post.article',
        ['user'=>$user,
            'post'=>$post,
            'count'=>$count,
            'query'=>$query]);
    }
}
