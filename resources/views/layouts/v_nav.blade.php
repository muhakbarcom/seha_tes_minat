<nav id="navbar" class="navbar">
  <ul>
    @foreach(['/' => 'Home', 'test-info' => 'Test information', 'consultation' => 'Consultation', 'program-study' =>
    'Program Study', 'contact' => 'Contact'] as $url => $label)
    <li>
      <a class="nav-link scrollto {{ request()->is($url) ? 'active' : '' }}" href="{{ url($url) }}">{{ $label }}</a>
    </li>
    @endforeach

    @auth('sanctum')
    {{-- Tampilkan konten untuk pengguna yang sudah login --}}
    <li><a class="getstarted scrollto">{{ Auth::user()->name }} </a></li>
    <li>
      <a type="button" class="getstarted scrollto" id="logoutBtn">Logout</a>
    </li>
    @else
    {{-- Tampilkan konten untuk pengguna yang belum login --}}
    <li><a class="getstarted scrollto" href="{{ url('login') }}">Login</a></li>
    @endauth

  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->