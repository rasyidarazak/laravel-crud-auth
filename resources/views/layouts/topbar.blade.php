<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm small">
  @auth
    <button class="btn btn-dark mr-3" id="menu-toggle"><i class="fas fa-bars fa-fw"></i></button>
  @endauth
  <ul class="nav mt-lg-0">

    <li class="nav-item dropdown">
      <a class="nav-link{{ request()->is('/') ? ' font-weight-bold' : '' }}" href="/">Home</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link{{ request()->is('about') ? ' font-weight-bold' : '' }}" href="/about">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link{{ request()->is('posts', 'posts/*') ? ' font-weight-bold' : '' }}" href="/posts">Posts</a>
    </li>

  </ul>
  <ul class="nav ml-auto mt-lg-0">

    @if(Auth::guest())
      <li class="nav-item dropdown">
        <a class="nav-link{{ request()->is('login', 'password/*') ? ' font-weight-bold' : '' }}" href="{{ route('login') }}">
          {{ __('Login') }}
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link{{ request()->is('register') ? ' font-weight-bold' : '' }}" href="{{ route('register') }}">
          {{ __('Register') }}
        </a>
      </li>
    @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right mx-2" aria-labelledby="navbarDropdown">
          {{-- <a class="dropdown-item small" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile</a>
          <a class="dropdown-item small" href="#"><i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i> Settings</a>
          <div class="dropdown-divider"></div> --}}
          <a class="dropdown-item small" data-toggle="modal" data-target="#logoutModal" href="#" onclick="event.preventDefault();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
        </div>
      </li>
    @endif

  </ul>
</nav>