<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AddPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:writer']);
    }
    public function Upload(Request $request){




          $validated =  $request->validate([
                    'title'=>'required',
                    'vacancyImageFiles'=>'mimes:jpeg,JPG,jpg,PNG,png,gif|max:1024|required',
                    'summary'=>'required',
                    'contents'=>'required',
                ]);
        if($request->hasFile('vacancyImageFiles')){





                    if(App::environment('local')){

             $filenamewithextension = $request->file('vacancyImageFiles')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension,PATHINFO_FILENAME);
            $extension = $request->file('vacancyImageFiles')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //$url = Storage::Url($filenametostore);
            Storage::putFileAs('public/storage',$request->file('vacancyImageFiles')->getRealPath(),$filenametostore);


           $path  = asset('storage/storage/'.$filenametostore);
            $request->user()->posts()->create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'content'=>$request->contents,
            'cover_image'=>$path,





        ]);
            return redirect()->route('dashboard');
        }else{

            $uploadedFileUrl = cloudinary()->upload($request->file('vacancyImageFiles')->getRealPath(),[
                'folder'=>'sureword',
            ])->getPath();
            $post = $request->user()->posts()->create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'content'=>$request->contents,

            'cover_image'=>$uploadedFileUrl,
            ]);

            return redirect()->route('dashboard');
        }

        }









        return back();
    }
}
