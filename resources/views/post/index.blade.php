@extends('layouts.app')
@section('title','My Posts Page ')
@section('content')
    <div class="flex items-center pt-16 h-auto w-full bg-gray-100 px-0 m-auto min-h-screen flex-col">
        <div class="w-full bg-white p-6 h-20 flex flex-row justify-between border-b-2 border-gray-100">
            <div class="uppercase tracking-wide text-xl text-indigo-500 font-semibold">my articles </div>
            <div class="w-6/12 h-auto p-1 flex justify-center items-center align-middle">
                <input  class="w-full bg-gray-200 h-12 p-2 self-center flex justify-self-center" type="text" placeholder="Search your articles"/>
            </div>
            <div class="w-4/12 h-full flex bg-white justify-end items-center">
                <a href="{{route('addpost')}}" class="bg-gray-800 text-white font-semibold py-2 px-4 border border-gray-400 h-12 shadow capitalize">add article</a>
            </div>

        </div>

{{--        it is time to display the posts --}}

        <div class="w-full h-auto flex-col flex md:flex-row lg:flex-row xl:flex-row pt-8 md:flex-wrap md:items-center md:justify-center" id="">
  @foreach($posts as $post)
                <div class="lg:w-4/12 xl:w-3/12 md:w-6/12 md:m-6 xl:mx-1 mx-auto bg-white my-6 mx-1 shadow-md overflow-hidden max-w-2xl">
                    <div class="">
                        <div class="">
                            <img class="h-48 w-full object-cover" src="{{asset($post->cover_image)}}" alt="">
                        </div>
                        <div class="p-8 md:h-64 lg:h-64 xl:h-64 overflow-hidden block">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{$post->user->name}}</div>
                            <a href="{{route('article.show',[$post])}}" class="block mt-1 text-lg  leading-tight font-medium text-black hover:underline">{{$post->title}}</a>
                            <p class="mt-2 text-gray-500 overflow-hidden overflow-ellipsis whitespace-no-wrap lg:whitespace-normal lg:h-32  h-auto">{{$post->summary}}</p>
                        </div>
                    </div>
                    <div class="w-full p-1 h-auto  flex-row flex justify-center space-x-6 items-center">
                        <form method="get" action="{{route('posts.edit',$post->id)}}">
                            @csrf
                            <button class="underline uppercase" type="submit">edit</button>
                        </form>
                        <form method="post" action="{{route('posts.edit',$post)}}">
                            @csrf
                            @method('DELETE')
                            <button class="underline uppercase text-red-500" type="submit">delete</button>
                        </form>
                    </div>
                </div>
@endforeach
            </div>



    </div>


@endsection
