<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('posts.index') }}">Home</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is('posts*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
            Posts
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item {{ request()->is('posts') ? 'active' : '' }}" href="{{ route('posts.index') }}">Posts List</a>
            </li>
            <li>
              <a class="dropdown-item {{ request()->is('posts/create') ? 'active' : '' }}" href="{{ route('posts.create') }}">New Post</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
