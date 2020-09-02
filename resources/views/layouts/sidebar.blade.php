<div class="bg-dark border-right text-white" id="sidebar-wrapper">
  <div class="sidebar-heading font-weight-bold"><a href="/" class="title-app"><i class="fas fa-fw fa-code mr-2 font-italic"></i> Laravel App</a></div>
  <div class="list-group list-group-flush">
    <a href="/dashboard" class="list-group-item list-group-item-action bg-dark text-white{{ request()->is('dashboard') ? ' font-weight-bold' : '' }}">Dashboard</a>
    <a href="/posts" class="list-group-item list-group-item-action bg-dark text-white{{ request()->is('posts', 'posts/*') ? ' font-weight-bold' : '' }}">Posts</a>
    {{-- <a href="#" class="list-group-item list-group-item-action bg-dark text-white{{ request()->is('profile') ? ' font-weight-bold' : '' }}">Profile</a>
    <a href="#" class="list-group-item list-group-item-action bg-dark text-white{{ request()->is('settings') ? ' font-weight-bold' : '' }}">Settings</a> --}}
    <a href="#" data-toggle="modal" data-target="#logoutModal" href="#" onclick="event.preventDefault();" class="list-group-item list-group-item-action bg-dark text-white">Logout</a>
  </div>
</div>