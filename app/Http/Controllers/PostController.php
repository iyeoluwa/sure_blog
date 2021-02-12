<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:writer']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        # show posts when the page is being shown
        $posts = $user->posts()->paginate(10);
        //this page is to show the place to post
        return view('post.index',[
            'posts'=>$posts,
            'user'=>$user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =Post::find($id);
        return view('post.editpost',[
            'post'=>$post
        ]);

    }

    public function showForm(){
        return view('post.addpost');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'vacancyImageFiles' => 'mimes:jpeg,png,gif|max:1024|required',
            'summary' => 'required',
            'contents' => 'required',
        ]);
        if ($request->hasFile('vacancyImageFiles')) {
             $post = Post::find($id);
             $image = $post->cover_image;


            $filenamewithextension = $request->file('vacancyImageFiles')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('vacancyImageFiles')->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            Storage::putFileAs('public/storage',$request->file('vacancyImageFiles')->getRealPath(),$filenametostore);



            $path = asset('storage/storage/' . $filenametostore);


            $post->title = $request->title;
            $post->summary = $request->summary;
            $post->content = $request->contents;
            $post->cover_image = $path;
            $post->save();
            return redirect()->route('dashboard');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post ,Request $request)
    {
        $request->user()->posts()->where('id',$post->id)->delete();
        return back();
    }
}
