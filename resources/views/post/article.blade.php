@extends('layouts.app')

@section('title',$post->title.' - article')
@section('content')
    @prepend('scripts')
        <link rel="stylesheet" type="text/css" href="{{asset('css/trix.css')}}">
{{--        <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.css')}}">--}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/link.css')}}">


    @endprepend
@push('scripts')

    <script src="{{asset('js/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{ asset('js/share.js') }}"></script>
  <script  src="{{asset('js/fontawesome.js')}}"></script>
      <script  src="{{asset('js/all.js')}}"></script>

@endpush


<div class="flex items-center md:pt-16 h-auto w-full px-0 m-auto flex-col relative">
    <div class="md:w-10/12 w-full  md:p-6  h-auto flex flex-row ">
        <div class="flex flex-col  h-auto md:py-6 h-auto w-full">
            <div class="w-full h-auto md:my-2 mx-auto">
                <img class="object-cover w-full m-auto block" src="{{asset($post->cover_image)}}"/>
            </div>
            <div class="w-full px-4 lg:pt-20 py-5 flex flex-col align-middle justify-center h-auto">
                <div class="w-full flex flex-row my-6 justify-between bg-gray-100 px-2 py-4 md:bg-white">
                    <small class="md:text-lg capitalize "><li class="fa fa-eye inline-flex mr-2"></li>{{$count. ' views'}}</small>
                    <small class="md:text-lg capitalize "><li class="fa fa-clock inline-flex mr-2"></li>{{read_time($post->content)}}</small>

                </div>
                <div class="relative w-full h-auto">
                    <div class="trix-content">

                        <h1>{{$post->title}}</h1>


                         {!!$post->content!!}
                    </div>


                    {!!Share::page(url()->full(),$post->title,['class'=>'h-auto w-16 justify-center md:w-20 md:ml-6 md:m-4 flex text-3xl'],'<ul class="md:mt-32 md:fixed top-0 left-0 md:w-64 h-auto flex  w-full justify-center md:flex-col">','</ul>')->facebook()->twitter($post->summary)->linkedin($post->summary)->whatsapp()->telegram($post->summary)!!}
                </div>




            </div>
            <div class="flex flex-col h-auto bg-white md:w-8/12 w-full mb-24">
                <div class="w-full md:p-2 md:px-6 md:h-auto md:h-20 h-auto flex justify-center p-2 px-2 mb-10 md:justify-start">
                    <div class="capitalize font-futura flex align-middle items-center tracking-wide leading-4 text-xl text-center md:text-left">article author</div>
                </div>
                <div class="w-full md:h-40 h-auto p-4 flex-wrap flex flex-col md:flex-row md:justify-start justify-center items-center md:items-start">
                    <div class="w-32 h-32 bg-gray-200 rounded-full md:mr-4 "></div>
                    <div class="md:w-6/12 w-full md:p-2 md:h-full h-20 p-2 mr-2 uppercase align-middle justify-center md:justify-start items-center md:text-left  font-futura flex align-middle items-center tracking-wide leading-4 ">{{$post->user->name}}</div>
                    <div class="w-full md:w-auto h-auto md:h-full bg-white flex align-middle items-center md:ml-4  md:pl-4 justify-center"><a href="{{route('profile.show',[$post->user->id])}}" class="bg-white flex items-center text-green-600 rounded-lg font-semibold py-2 px-4 border border-green-600 h-12 capitalize outline-none">Check profile</a></div>
                </div>

            </div>
             <div class="w-full h-auto flex flex-col py-5 bg-white flex-wrap">
                 <div class="capitalize flex align-middle items-center tracking-wide leading-4 text-2xl py-2 px-4 md:px-0">
                                Comments
                 </div>
                 <form method="post" action="{{route('comment.add')}}" class="flex flex-col justify-start py-2">
                     @csrf
                     <div class="w-full md:w-8/12 h-auto py-2 flex flex-col flex-wrap px-4 md:px-0">
                         <textarea placeholder="Type your comment..." style="resize:none" name="comment" class="w-full h-40 border-2 border-gray-400 flex p-2 my-3"></textarea>
                         <input type="hidden" name="post_id" value="{{$post->id}}">
                         @if(auth()->user())

                         <button type="submit" class="w-8/12 md:w-4/12 h-10 bg-black text-white p-2 md:my-3 my-1">
                             <span class="tracking-wide leading-4">Submit</span>
                         </button>
                             @else
                             <a href="{{route('login')}}" class="w-8/12 md:w-4/12 text-center flex items-center justify-center h-10 bg-black text-white p-2 my-1 md:my-3 tracking-wide leading-4">Login To Comment</a>
                             @endif
                     </div>
                 </form>
                 <div class="w-full md:w-8/12 h-auto py-2 flex flex-col flex-wrap px-4 md:px-0">

                     @include('post.partials.replies',['comments'=>$post->comments,'post_id'=>$post->id])

                 </div>
             </div>



        </div>
    </div>

</div>
  @if(count($query) > 0)
    <div class="w-full h-auto p-4 px-6 flex flex-col">
        <div class="capitalize flex align-middle items-center border-b-2 border-gray-100 mb-6 tracking-wide leading-6 text-2xl py-4 md:px-0">More Articles</div>

        @include('recommendations.index')

    </div>
   @endif
@endsection
