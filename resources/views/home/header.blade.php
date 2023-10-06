<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/">
                     <img width="60" src="{{ ('/images/cat-1-1.png') }}" alt="#" style="margin-right: 10px;"/>
                 </a>
                 <a class="navbar-brand" href="/">
                     <span class="brand-text" style="font-size: 40px; color: #131313;">Pizza Haven Delight</span>
                 </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/menu">Menu</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/contact">Contact</a>
                        </li>

                        @if (Route::has('login'))

                        @auth

                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('show_cart') }}">Cart</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('profile.show') }}">profile</a>
                        </li>
                        
                        <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
</li>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

                        @else

                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>

                        @endauth

                        @endif
                        
                     </ul>
                  </div>
               </nav>
            </div>
         </header>