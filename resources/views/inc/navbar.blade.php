<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span style="font-weight: bold; font-size:30px">F</span><span class="text-success"
                style="font-weight: bold;font-size:30px">jOB</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <form class="container-fluid justify-content-start">



                    <li class="nav-item mx-3"><a href="/" style="color: black"
                            class="btn btn-outline-success me-2">Home</a></li>


                    <li class="nav-item mx-3"> <a href="/about" style="color: black"
                            class="btn btn-outline-success me-2">About</a> </li>
                    <li class="nav-item mx-3"><a href="/posts" style="color: black"
                            class="btn btn-outline-success me-2">Find job</a></li>
                </form>


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->email == 'ibrahim@example.com')
                                <a href="/admin/landingpage" class="dropdown-item">Posts Management</a>
                                <a href="/admin/usercontrol" class="dropdown-item">Users Management</a>

                            @else
                                <a href="/dashboard" class="dropdown-item">Dashboard</a>

                            @endif


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
