@extends('layouts.app')

@section('title','dashboard')
@section('content')
<div class="flex items-center pt-16 h-auto w-full bg-gray-100 px-0 m-auto min-h-screen flex-col">
    <div class="w-10/12 bg-white p-6 h-20 m-10 flex flex-row justify-between mb-0 border-b-2 border-gray-100">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
            Your Dashboard
        </div>
        <div class="tracking-wide text-sm text-black font-semibold"> Welcome {{auth()->user()->name}}</div>


    </div>

    <div class="w-10/12 bg-white p-6 h-auto  flex flex-row border-b-2 border-gray-200">
        <div class= "w-4/12 h-auto p-4 border-r-2 flex-col border-gray-200 flex items-center justify-center p-2 ">
           <div class="text-xl text-gray-900 p-2">Total Articles Written</div>
             <div class="text-4xl">{{auth()->user()->posts()->count()}}</div>
        </div>

        <div class="w-4/12 h-auto p-4 border-r-2 flex-col border-gray-200 flex items-center justify-center p-2">
             <div class="text-xl text-gray-900 p-2 capitalize">Total article views </div>
             <div class="text-4xl">0</div>
        </div>

        <div class="w-4/12 h-auto p-4  flex-col flex items-center justify-center p-2">
             <div class="text-xl text-gray-900 p-2 capitalize">your Most viewed article </div>
             <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Finding customers for your new business</a>
        </div>


    </div>
    <div class="w-10/12 bg-white p-6 h-auto flex flex-col justify-between mb-0 border-b-4 border-gray-100">
        <div class=" pb-4">
            <a href="{{route('myposts',auth()->user())}}" class="text-xl text-gray-900 p-2 capitalize">My articles </a>
        </div>
         <div class=" pb-4">

             <a href="{{route('profile.add',[auth()->user()->id])}}" class="text-xl text-gray-900 p-2 capitalize">My profile</a>
        </div>

    </div>
    <div class="w-10/12  p-6 h-auto  flex flex-row border-b-2 border-gray-200">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">your recent articles </div>


    </div>
</div>
@endsection
