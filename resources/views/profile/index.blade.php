@extends('layouts.app')
@section('title','add profile')
@section('content')
<div class="flex items-center pt-16 h-auto w-full bg-gray-100 px-0 m-auto min-h-screen flex-col">
    <div class="w-10/12 bg-white p-6 h-auto m-10 flex flex-col  mb-0 border-b-2 border-gray-100">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold text-center md:text-left">Your profile</div>
    </div>

     <div class="w-10/12 bg-white p-6 h-auto m-10 flex flex-col  justify-between flex-wrap md:flex-row mb-0 border-b-2 border-gray-100">

        <form method="post" action="{{route('profile.add',[$user])}}" class="w-full h-auto">
            @csrf
            <div class="w-full h-auto flex flex-col md:flex-row p-8 m-8 justify-center">
                <div class="w-40 h-40 bg-gray-500 rounded-full m-auto"></div>
            </div>

         <div class="w-full h-auto flex flex-col md:flex-row justify-center">
             <div class="md:w-5/12 w-full h-auto flex flex-col overflow-hidden items-start mr-4 ">
                 <div class="tracking-wide text-sm text-black font-semibold">Name</div>
                 <input name="name" value="{{old('name',$user->name)}}" class="w-full h-10 p2  my-4 mx-auto px-4 border-2 border-gray-700" placeholder="Your Firstname"/>
             </div>
              <div class="md:w-5/12 w-full h-auto flex flex-col overflow-hidden items-start mr-4 ">
                 <div class="tracking-wide text-sm text-black font-semibold">Username</div>
                 <input name="username" value="{{old('username',$user->username)}}" class="w-full h-10 p2  my-4 mx-auto px-4 border-2 border-gray-700" placeholder="Your Username"/>

             </div>



         </div>

         <div class="w-full h-auto flex flex-col md:flex-row justify-center">
             <div class="md:w-5/12 w-full h-auto flex flex-col overflow-hidden items-start mr-4">
                 <div class="tracking-wide text-sm text-black font-semibold">E-mail</div>
                 <input name="email" value="{{old('email',$user->email)}}" class="w-full h-10 p2  my-4 mx-auto px-4 border-2 border-gray-700" placeholder="Your E-mail"/>

             </div>
         </div>

         <div class="w-full h-auto text-black tracking-wide my-10 text-center text-2xl capitalize font-semibold">Your social accounts </div>

         <div class="w-full h-auto flex flex-col md:flex-row justify-center">
            <div class="md:w-5/12 w-full h-auto flex flex-col overflow-hidden items-start mr-4 ">
                 <div class="tracking-wide text-sm text-black font-semibold">Facebook</div>
                 <input name="facebook" value="{{old('facebook',$user->facebook)}}" class="w-full h-10 p2  my-4 mx-auto px-4 border-2 border-gray-700" placeholder="@username"/>

             </div>
             <div class="md:w-5/12 w-full h-auto flex flex-col overflow-hidden items-start mr-4">
                 <div class="tracking-wide text-sm text-black font-semibold">Twitter</div>
                 <input name="twitter" value="{{old('twitter',$user->twitter)}}" class="w-full h-10 p2  my-4 mx-auto px-4 border-2 border-gray-700" placeholder="@username"/>

             </div>
         </div>

         <div class="w-full h-auto flex flex-col md:flex-row justify-center">
            <div class="md:w-5/12 w-full h-auto flex flex-col overflow-hidden items-start mr-4 ">
                 <div class="tracking-wide text-sm text-black font-semibold">Instagram</div>
                 <input name="instagram" value="{{old('instagram',$user->instagram)}}" class="w-full h-10 p2  my-4 mx-auto px-4 border-2 border-gray-700" placeholder="@username"/>

             </div>
             <div class="md:w-5/12 w-full h-auto flex flex-col overflow-hidden items-start mr-4">
                 <div class="tracking-wide text-sm text-black font-semibold">LinkedIn</div>
                 <input name="linkedin" value="{{old('linkedin',$user->linkedin)}}" class="w-full h-10 p2  my-4 mx-auto px-4 border-2 border-gray-700" placeholder="@username"/>

             </div>
         </div>


         <div class="lg:w-8/12 w-full  h-auto block p-1 md:p-4">

             <div class="lg:w-10/12 w-full text-black  tracking-wide my-10 text-left text-md capitalize font-semibold ">Tell us about yourself</div>
            <textarea name="personalinfo" class="w-full md:w-full lg:w-8/12 h-64 border-2 border-gray-700 p-6" style="resize: none" placeholder="Describe yourself you can also write your hobbies">{{old('personal-info',$user->personal_info)}}</textarea>
         </div>

         <div class="w-full h-auto flex bg-white justify-start items-center my-10 md:my-4 ">
                <button  type="submit" class="bg-gray-800 text-white font-semibold py-2 px-4 border border-gray-400 h-12 shadow capitalize">add profile</button>
         </div>
        </form>
    </div>

</div>



@endsection
