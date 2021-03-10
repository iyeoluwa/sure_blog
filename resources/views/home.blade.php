<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <meta property="og:site_name" content="A More Sure Word Blog" />
        <meta property="og:title" content="A More Sure Word Blog" />
        <meta property="og:description" content="Official Blog Of A MoreSureword" />
        <meta property="og:url" content="{{url()->full()}}" />
        <meta property="og:type" content="blog" />
        <meta property="og:image" content="{{asset('img/stencil.default(1).png')}}" />
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:image" content="{{asset('img/stencil.default(1).png')}}" />
    <title>sureword Blog | ,Home Page</title>

</head>
<body class="">

<nav class="bg-gray-800 sticky top-0 w-full z-20">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button id="parent-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!-- Icon when menu is closed. -->
          <!--
            Heroicon name: menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg id="open-menu" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!-- Icon when menu is open. -->
          <!--
            Heroicon name: x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg id="close-menu" class=" left-0 z-20 close-menu hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start space-x-64 md:space-x-20">
        <div class="flex-shrink-0 flex items-center">
          <img class="block lg:hidden h-8 w-auto" src="{{asset('img/logo-white.png')}}" alt="A More Sure Word">
          <img class="hidden lg:block h-8 w-auto" src="{{asset('img/logo-white.png')}}" alt="A More Sure Word">
        </div>
        <div class="hidden sm:block sm:ml-6 self-center w-6/12">
          <div class="flex">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{route('home')}}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>

          </div>
        </div>
           <div class="hidden sm:block sm:ml-6 self-center w-6/12">
            <div class="flex">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                @if(!auth()->user())
                <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium capitalize">Login</a>
                @else
                    <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium capitalize">Logout</button>
                </form>
                @endif
            </div>
          </div>
      </div>

    </div>
  </div>

  <!--
    Mobile menu, toggle classes based on menu state.

    Menu open: "block", Menu closed: "hidden"
  -->
  <div id="mobile-menu" class="w-full h-screen  bg-gray-900 top-0 bottom-0 absolute hidden sm:hidden">

    <div class="w-full p-4 flex  items-center justify-center">
                    <img class="block lg:hidden h-8 w-auto" src="{{asset('img/logo-white.png')}}" alt="A More Sure Word">
    </div>

    <div class=" flex justify-center px-2 pt-2 pb-3 space-y-1">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="{{route('home')}}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
    </div>
      <div class="flex justify-center px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                @if(!auth()->user())
                <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium capitalize">Login</a>
                @else
                    <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium capitalize">Logout</button>
                </form>
                @endif
            </div>
  </div>
</nav>







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
 @if($posts->count())
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
       @else

       <div class="">There are no articles yet </div>
       @endif
            </div>




        </div>

    </div>
<script src="{{asset('js/home.js')}}"></script>
</body>
</html>

