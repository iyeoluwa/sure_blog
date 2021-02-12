<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;

class RecommendationController extends Controller
{
    public function index(){
        //this function returns the view of the recommendation page
    }
    public function author(Post $post){


            $query = Post::where(['user_id'=>$post->user_id],['id','!=',$post->id])->take(4)->get();
            return view('post.article',[
                'query'=>$query,
            ]);


    }
}
