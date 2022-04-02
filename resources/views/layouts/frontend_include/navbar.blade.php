<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
       

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{ url('/') }}" class="nav-link px-2 {{ Request::is('/') ? 'text-secondary' : 'text-white' }}" >Home</a></li>
          <li><a href="{{ url('product_view') }}" class="nav-link px-2 {{ Request::is('product_view') ? 'text-secondary' : 'text-white' }}">Product</a></li>
          <li><a href="{{ url('outlet_view') }}" class="nav-link px-2 {{ Request::is('outlet_view')  ? 'text-secondary' : 'text-white' }} ">Outlet</a></li>
          <li><a href="{{ url('about_me') }}" class="nav-link px-2 {{ Request::is('about_me') ? 'text-secondary' : 'text-white' }}">About</a></li>
          <li><a href="{{ url('contact') }}" class="nav-link px-2 {{ Request::is('contact') ? 'text-secondary' : 'text-white' }}">Contact</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
            
        @guest
            @if (Route::has('login'))
            <a href="{{ url('login') }}"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
            @endif

            @if (Route::has('register'))
            <a href="{{ url('register') }}"><button type="button" class="btn btn-warning">Sign-up</button></a>
            @endif
            @else
            <a class="btn btn-outline-light me-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
            
            @endguest
          </div>
      </div>
    </div>
  </header>