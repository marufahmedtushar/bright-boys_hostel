<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">Bright Boys Hostel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="/" class="nav-link {{ '/' == request()->path() ? 'active' : '' }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/about" class="nav-link {{ 'about' == request()->path() ? 'active' : '' }}" class="nav-link">About Us</a></li>
          <li class="nav-item"><a href="/contact" class="nav-link {{ 'contact' == request()->path() ? 'active' : '' }}" class="nav-link">Contact</a></li>
          <li class="nav-item">

                    <!-- Authentication Links -->
                @guest
                    <li class="nav-item m-auto">
                        <a class="btn btn-primary" href="/login">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item m-auto">
                            <a class="btn btn-primary" href="/register">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                    </li>
        </ul>
      </div>
    </div>
  </nav>