<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">

    <title>sureword Blog | @yield('title', 'Welcome')</title>
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




@yield('content')
@stack('scripts')
<script src="{{asset('js/home.js')}}"></script>
</body>
</html>
