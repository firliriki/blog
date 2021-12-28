<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('layout.sc_head')
</head>
<body class="bg-gradient-to-b from-white to-pink-200">
    <div class="container">
        <nav class="bg-green-600">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    <h2 style="background-color: white">OUR BLOG</h2>
                  </div>
                  <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                      <a href="{{ url('/') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
        
                      <a href="{{url('/blog') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Blog</a>
        
                      <a href="{{url('/contact') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contacts</a>
                        
                     
               
                    </div>
                  </div>

                  <div class="hidden md:block">
                    <div class="ml-8 flex items-center md:ml-6">
                      @if (Route::has('login'))
                      @auth
                      <a href="{{ url('/profile') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{Auth::user()->username}}</a>
                      @if (Auth::user()->role=="admin"||Auth::user()->role=="author")
                      <a href="{{ url('/admin/dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Post Panel</a>
                      @else
                      <a href="{{ url('/r') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Daftar Author</a>
                      @endif
                      <a href="{{ url('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                     @if (Route::has('register'))
                     <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                @endif
                @endauth
                @endif
          
                <form action="{{ url('search') }}" class="form-inline my-2 my-lg-0">
                  <input name="s" type="text" class="form-control mr-sm-2" placeholder="Search">
              </form>
                    </div>
                  </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                  <!-- Mobile menu button -->
                  <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Heroicon name: outline/menu
        
                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                      Heroicon name: outline/x
        
                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
        
            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
              <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{ url('/') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
        
                <a href="{{url('/blog') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Blog</a>
  
                <a href="{{url('/contact') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Contacts</a>
                  
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/profile') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">{{Auth::user()->username}}</a>
  
                <a href="{{ url('logout') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                  <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  @else
                  <a href="{{ route('login') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Log in</a>
               @if (Route::has('register'))
               <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
          @endif
          @endauth
          @endif
          <form action="{{ url('search') }}" class="form-inline my-2 my-lg-0">
            <input name="s" type="text" class="form-control mr-sm-2" placeholder="Search">
        </form>
              </div>
             
              </div>
          </nav>
        
          <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
              <h1 class="text-3xl font-bold text-gray-900">
                @yield('title')
              </h1>
            </div>
          </header>
          <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('profile')
                <div class="grid grid-cols-2 gap-4">
                  <div>
                    @yield('content')
                  </div>
                  <div>
                    @yield('sidebar')
                  </div>  
                        
                </div>
              <!-- /End replace -->
            </div>
          </main>
        </div>
        {{-- Nav --}}

        
        
        <div class="copy">
            &copy; {{ date("Y") }} OUR BLOG - FIRLI RIKI
        </div>
    @include('layout.sc_footer')
</body>
</html>