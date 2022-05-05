    <nav>
        @guest
        <div class="logo"> <a href="{{url('/')}}" class="no-link"><i class="fab fa-trello"></i> Trello Like</div></a>
        @else
        <div class="logo"> <a href="{{route('app.index')}}" class="no-link"><i class="fab fa-trello"></i> Trello Like</div></a>
        @endguest
        <div class="tools">
            <div class="user">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}"><span class="link-menu">{{ __('Login') }}</span></a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item ">
                                <a href="{{ route('register') }}"><span class="link-menu">{{ __('Register') }}</span></a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <span id="navbarDropdown" class="dropdown-toggle link-menu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </span>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">{{ __('Edit Profile') }}</a>
                            
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>                                

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
