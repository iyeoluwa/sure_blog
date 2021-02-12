@extends('layouts.app')
@section('title','add article')
@section('content')
@prepend('scripts')
<link rel="stylesheet" type="text/css" href="{{asset('css/trix.css')}}"/>
<script type="text/javascript" src="{{asset('js/trix.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/input.js')}}"></script>
@endprepend

<div class="flex items-center pt-16 h-auto w-full bg-gray-100 px-0 m-auto min-h-screen flex-col">
    <div class="w-10/12 bg-white p-6 h-auto m-10 flex flex-col  mb-0 border-b-2 border-gray-100">


    <form class="w-full h-full" method="post" action="{{route('posts.edit',[$post->id])}}" enctype="multipart/form-data">

                         @csrf
             @error('vacancyImageFiles')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            <div class="overflow-hidden relative w-64 mt-4 mb-4 flex">
                <button class="bg-gray-900 hover:bg-indigo-dark text-white font-bold py-2 px-4 w-full inline-flex items-center">
                    <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                    </svg>
                    <span class="ml-2 capitalize">Article cover image </span>
                </button>
                <input class="cursor-pointer absolute block opacity-0 pin-r pin-t h-full w-full" type="file" name="vacancyImageFiles" value="{{old('vacancyImageFiles',$post->cover_image)}}" >

            </div>
            <div class="flex flex-col mt-5">
                <div class="capitalize tracking-wide text-xl text-black font-semibold">
                    Article Title
                </div>

                <div class="w-6/12 my-4 h-12 align-middle items-center flex">
                    <input type="text" name="title" value="{{old('title',$post->title ?? null)}}" placeholder="Type the article title here..." class="w-full border border-gray-900 h-full p-2 "/>
                </div>
                @error('title')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="flex flex-col mt-5">
                <div class="capitalize tracking-wide text-xl text-black font-semibold">
                    Article Summary
                </div>

                <div class="w-6/12 my-4 h-48 align-middle items-center flex">
                    <textarea id="summary_textarea" name="summary" type="text" style="resize:none" class="w-full border border-gray-900 h-full p-2 " placeholder="Type the article summary here...">{{old('summary',$post->summary)}}</textarea>
                </div>
                <div class="flex w-full" id="charcounter">0</div>
                @error('summary')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>



        <div class="flex flex-col mt-5">
                <div class="capitalize tracking-wide text-xl text-black font-semibold">
                    Article body
                </div>
                <div class="relative flex flex-col my-4 h-auto ">

                         <input id="x" type="hidden" name="contents" value="{{old('contents',$post->content)}}">
                         <trix-editor class="trix-content" input="x">{{old('contents',$post->content)}}</trix-editor>

                </div>
            @error('contents')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
        </div>
    <div class="overflow-hidden relative w-full mt-10 mb-10 flex justify-end">
        <button type="submit" class="bg-gray-900 hover:bg-indigo-dark text-white font-bold py-2 px-4 w-40 inline-flex items-center justify-center"><span class="ml-2 capitalize">post article</span></button>
    </div>

</form>

    </div>
</div>
@endsection
