@extends('layouts.app')
@section('title','Login')
@section('content')
    <div class="flex justify-center pt-16 h-auto w-full bg-gray-100 px-0 m-auto min-h-screen" id="">
        <div class="m-auto h-auto min-h-64 p-2 flex flex-col w-4/12 bg-white p-6 rounded-lg" id="">
    @if(session('status'))
        <div class="bg-red-500 text-white text-center md-6  p-4 rounded-lg">
            {{session('status')}}
        </div>
    @endif
        <form action="{{route('login')}}" method="post">
        @csrf


            <div class="mb-4">
                <label for="email" class="sr-only"></label>
                <input type="email" value="" name="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')border-red-500 @enderror" id="Email" value="{{old('email')}}">

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="Password" class="sr-only"></label>
                <input type="password" value="" name="password" placeholder="Choose a Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')border-red-500 @enderror" id="password">

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remeber">Remember me </label>
                </div>
            </div>



            <div class="">
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded  font-medium w-full">Login</button>
            </div>

        </form>
    </div>
</div>
@endsection
