<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
    </ul>

    @auth
        <ul class="navbar-nav collapse navbar-collapse d-flex justify-content-end">
            <li class="nav-item d-none d-sm-inline-block bg-danger rounded-pill">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    LogOut
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    @endauth

    @guest
        <ul class="navbar-nav collapse navbar-collapse d-flex justify-content-end">
            <li class="nav-item d-none d-sm-inline-block bg-success rounded-pill">
                <a href="/login" class="nav-link">Login</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block bg-info rounded-pill ml-1">
                <a href="/register" class="nav-link">Register</a>
            </li>
        </ul>
    @endguest
</nav>
