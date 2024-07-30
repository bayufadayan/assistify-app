<!-- resources/views/layouts/navigation.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 0 0 30px 0 rgba(0,0,0,0.3)">
    <a href="/" class="logo-navbar">
        <img src="/assets/images/favikon.png" alt="logo" class="ml-4 mr-2">
        <img src="/assets/images/Only Logo.png" alt="logo">
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link btn btn-success" href="{{ route('dashboard') }}"
                        style="color: white; font-weight: bold;">Dashboard</a>
                </li>
                @if (Auth::user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary" href="{{ route('user.dashboard') }}"
                            style="margin-inline: 10px; color: white;">Go to User Dashboard </a>
                    </li>
                @else
                <li class="nav-item">
                    <a class="nav-link btn btn-secondary" href="/user/upload-pendaftar"
                        style="margin-inline: 10px; color: white;">Upload Pendaftar </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link btn myhover" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
