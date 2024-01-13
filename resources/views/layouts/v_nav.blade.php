<nav id="navbar" class="navbar">
  <ul>
    @foreach(['/' => 'Home', 'test-info' => 'Test information', 'consultation' => 'Consultation', 'program-study' =>
    'Program Study', 'contact' => 'Contact'] as $url => $label)
    <li>
      <a class="nav-link scrollto {{ request()->is($url) ? 'active' : '' }}" href="{{ url($url) }}">{{ $label }}</a>
    </li>
    @endforeach
    <li><a class="getstarted scrollto" href="#about">Login</a></li>
  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->