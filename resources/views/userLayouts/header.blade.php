<header>
  <nav>
    <div class="logo">X-Reservation Project</div>
    <ul>
      <li><a href="{{ route('welcome') }}" >Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">business</a></li>
      <li><a href="{{route('services.index')}}">Services</a></li>
      <li><a href="#">Contact</a></li>

      @auth
      <!-- Dropdown menu for authenticated users -->
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Account</a>
        <div class="dropdown-content">
          <a href="#">Profile</a>
          <a href="#">Settings</a>
           
          <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();">
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
        </div>
      </li>
      @else
      <li><a href="{{ route('register') }}">Sign Up or Sign In</a></li>
      @endauth
 
    </ul>
  </nav>
</header>
