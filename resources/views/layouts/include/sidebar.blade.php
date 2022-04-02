<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">
              <span data-feather="arrow-right"></span>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              Go to Website
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ url('dashboard') }}">
              <span data-feather="home"></span>
              <i class="fa fa-home" aria-hidden="true"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="{{ url('categories') }}">
              <span data-feather="file"></span>
              <i class="fa fa-file" aria-hidden="true"></i>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ url('products') }}">
              <span data-feather="shopping-cart"></span>
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('outlets') ? 'active' : '' }}" href="{{ url('outlets') }}">
            <span data-feather="file"></span>
              <i class="fa fa-file" aria-hidden="true"></i>
              Outlets
            </a>
          </li>
          
</ul>
      </div>
    </nav>