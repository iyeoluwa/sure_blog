@extends('layouts.app')
@section('title',"Home Page")
@section('content')




    <div class="flex pt-16 h-auto w-full bg-gray-100 px-0 m-auto min-h-screen" id="">
        <div class="m-auto h-auto min-h-64 p-2 flex flex-col w-full" id="">

            <!-- this is for the most recent posts -->

            @auth
            @role('writer')
            <div class="w-full p-4 flex flex-col align-middle justify-center items-center ">
                <a href="{{route('dashboard')}}" class="bg-gray-800 text-white font-semibold py-2 px-4 border border-gray-400 h-12 shadow capitalize">
                    View dashboard
                </a>
            </div>

              @endrole
            @endauth
          <div class="w-full h-auto flex-col flex md:flex-row lg:flex-row xl:flex-row p-2 md:pt-8 md:flex-wrap md:items-center md:justify-center" id="">

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
@endsection
