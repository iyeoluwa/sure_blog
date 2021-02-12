@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="flex justify-center pt-16 h-auto w-full bg-gray-100 px-0 m-auto min-h-screen">
    <div class="m-auto h-auto min-h-64 p-2 flex flex-col w-4/12 bg-white p-6 rounded-lg">
        <form action="{{route('register')}}" method="post">
        @csrf
            <div class="mb-4">
                <label for="name" class="sr-only"></label>
                <input type="text" value="" name="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')border-red-500 @enderror" id="name" value="{{old('name')}}">

                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="username" class="sr-only"></label>
                <input type="text" value="" name="username" placeholder="username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username')border-red-500 @enderror" id="username" value="{{old('username')}}">

                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

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
                <label for="password_confirmation" class="sr-only"></label>
                <input type="password" value="" name="password_confirmation" placeholder="retype password" class="bg-gray-100 border-2 w-full p-4 rounded-lg " id="Email">
            </div>



            <div class="">
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded  font-medium w-full">Register</button>
            </div>

        </form>
    </div>
</div>
@endsection
