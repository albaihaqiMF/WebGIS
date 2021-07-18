<div class="sidebar shadow-lg">
  <div class="header-sidebar">
    <div class="card-sidebar" align="center">
      <h3>Admin WebGIS</h3>
    </div>
  </div>
  <hr>
  <div class="body-sidebar">
    {{$url = "http://localhost:8000/admin/"}}
    <a style="text-decoration: none" {{ url()->current() == $url.'dashboard' ? "class=active" : ''}} href="{{route('admin')}}">Beranda<i class="fas fa-box"></i></a>
    <a style="text-decoration: none" {{ url()->current() == $url.'disaster' ? "class=active" : ''}} href="{{route('admin.disaster')}}">Bencana<i class="fas fa-globe-asia"></i></a>
    <a style="text-decoration: none" {{ url()->current() == $url.'user_detail' ? "class=active" : ''}} href="{{route('admin.user')}}">Pengguna<i class="fas fa-users"></i></a>
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