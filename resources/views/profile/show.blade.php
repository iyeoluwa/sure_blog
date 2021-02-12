@extends('layouts.app')
@section('title','profile - '.$user->name)
@section('content')

    <div class="flex items-center h-auto w-full bg-gray-100 px-0 m-auto min-h-screen flex-col">
        <div class="bg-white w-full h-auto">
            <div class=" relative w-full bg-white px-0 h-auto flex flex-col  mb-0 border-b-2 border-gray-100">
                <div class="w-full h-40 bg-black"></div>
                <div class="w-20 h-20 border-4 border-white rounded-full bg-gray-500 absolute bottom-0 -mb-10 ml-5"></div>
            </div>

            <div class="w-full h-auto p-8 pb-4 mt-5 bg-white">
                <div class="w-full h-auto flex tracking-wide text-sm text-indigo-500 font-semibold">{{$user->name}}</div>
                <div class="w-full h-auto flex tracking-wide text-xs text-gray-700 font-medium">{{'@' . $user->username}}</div>
                <div class="w-full h-auto flex "></div>
                <div class="w-full h-auto flex text-xs text-gray-700 font-medium">{{$user->posts->count()}} {{Str::plural('article',$user->posts->count()) .' published'}}</div>
                <div class="w-full h-auto flex pt-5 text-black font-medium text-xs">{{$user->personal_info}}</div>
            </div>
            <div class="w-full h-auto relative top-0">
                <div class="w-full h-auto px-4 mt-5 bg-white ">
                    <div class="w-full border-2 p-4 border-gray-200 flex-row flex  sticky top-0 bg-white shadow-sm" style="top:3.2em">
                        <div class="font-semibold tracking-wide text-sm text-indigo-500" >Articles</div>
                    </div>
                    <div class="w-full h-auto py-4 bg-white flex flex-wrap flex-col md:flex-row items-center justify-center">
                        @foreach($posts as $post)
                            <div class="lg:w-4/12 xl:w-3/12 md:w-5/12 md:m-6 w-full xl:mx-1 mx-auto bg-white my-6 mx-1 shadow-md overflow-hidden">
                                <div class="">
                                    <div class="">
                                        <img class="h-48 w-full object-cover" src="{{asset($post->cover_image)}}" alt="">
                                    </div>
                                    <div class="p-8 md:h-64 lg:h-64 xl:h-64 overflow-hidden block">
                                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{$post->user->name}}</div>
                                        <a href="{{route('article.show',[$post])}}" class="block mt-1 text-lg  leading-tight font-medium text-black hover:underline">{{$post->title}}</a>
                                        <p class="mt-2 text-gray-500 overflow-hidden lg:whitespace-normal lg:h-32  h-auto hidden md:flex">{{$post->summary}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
