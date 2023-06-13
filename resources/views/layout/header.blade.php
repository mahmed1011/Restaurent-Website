 <!-- ***** Header Area Start ***** -->
 <header class="header-area header-sticky">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-6">
                 <nav class="main-nav navbar">
                     <!-- ***** Logo Start ***** -->
                     <a href="{{ route('home') }}" class="logo">
                         <img src="{{ asset('') }}assets/images/klassy-logo.png" class=""
                             align="klassy cafe html template">
                         <a class="menu-trigger">
                             <span>Menu</span>
                         </a>
                     </a>
                     <!-- ***** Logo End ***** -->
                     <!-- ***** Menu Start ***** -->
                     <ul class="nav navbar menu">
                         <li class="scroll-to-section"><a href="{{ route('home') }}" class="active">Home</a></li>
                         <li class="scroll-to-section"><a href="#about">About</a></li>

                         <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                         <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                         <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                         {{-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li> --}}
                         <li class="scroll-to-section"><a href="#reservation">Contact Us</a>
                         </li>
                         {{-- <li> --}}
                         {{-- @if (Route::has('login'))
                                 <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                     @auth --}}
                         {{-- <li class="">
                             <a href="{{ route('show.cart.items') }}"
                                 style="
                                 margin-left: -10px;
                                 padding-right: 38px;
                                 ">Cart[{{ $counts }}]</a>
                         </li> --}}
                         {{-- @else
                             <li><a href="{{ route('login') }}"
                                     class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                             </li>

                             @if (Route::has('register'))
                                 <li><a href="{{ route('register') }}"
                                         class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                 </li>
                             @endif
                         @endauth

                         @endif --}}
                         {{-- </li> --}}

                         <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                         @guest
                             <li>
                                 <a href="{{ route('user.signup') }}" class="color-set"
                                     style="text-decoration: none;font-weight: bold;">Signup</a>
                             </li>
                             <li><a href="{{ route('user.login') }}" title="OUR SERVICES" class="color-set"
                                     style="text-decoration: none;font-weight: bold;">Login</a></li>
                         @endguest

                         @auth
                             <li class="">
                                 <a href="{{ route('show.cart.items') }}"
                                     style="
                            margin-left: -10px;
                            padding-right: 38px;
                            ">Cart[{{ $counts }}]</a>
                             </li>
                             <div class="dropdown">
                                 <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">
                                     {{ Auth::guard('web')->user()->name }}
                                 </button>
                                 <div class="dropdown-menu">
                                     <form action="{{ route('user.logout') }}" method="POST">
                                         @csrf
                                         <a class="dropdown-item">
                                             <button class="btn btn-dark" type="submit">Logout
                                             </button>
                                         </a>
                                     </form>
                                 </div>
                             </div>
                         @endauth
                     </ul>
                     <!-- ***** Menu End ***** -->
                 </nav>
             </div>
         </div>
     </div>
 </header>
 <!-- ***** Header Area End ***** -->
