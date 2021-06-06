<div class="sidebar shadow-lg">
  <div class="header-sidebar">
    <div class="card-sidebar" align="center">
      <i class="fas fa-user-shield fa-3x"></i>
      <div>
        <h3>Admin</h3>
      </div>
    </div>
  </div>
  <div class="body-sidebar">
    <a style="text-decoration: none" href="{{route('admin')}}">Dashboard<i class="fas fa-box"></i></a>
    <a style="text-decoration: none" href="{{route('admin.disaster')}}">Disaster<i class="fas fa-globe-asia"></i></a>
    <a style="text-decoration: none" href="{{route('admin.user')}}">Users<i class="fas fa-users"></i></a>
    <a style="text-decoration: none" href="{{route('maps')}}">Maps<i class="fas fa-map-marked-alt"></i></a>
  </div>
  <div class="footer-sidebar">
    <div class="myDropdown">
      <button class="myBtn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">Options
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{route('home')}}">Home</a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();
                      console.log('logout')">
          {{ __('Logout') }}
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </a>
      </div>
    </div>
  </div>
</div>