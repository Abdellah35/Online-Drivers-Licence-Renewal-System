<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
        <h2 class="m-0"><i class="fa fa-car text-primary me-2"></i>ET-Drivers</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-1 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ url('/appointment/index') }}" class="nav-item nav-link">Appointment</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Contact</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="#contact" class="dropdown-item">Contact Info</a>
                    <a href="{{ url('/feedback/index') }}" class="dropdown-item">Feedback</a>
                </div>
            </div>
            <div class="row d-flex justify-content-between col-sm-12">
                <a href="#about" class="nav-item nav-link">About</a>
                <div class="row d-flex">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/logout-user-session') }}" class="nav-item nav-link">Logout</a>
                            <a href="{{ route('register') }}" class="nav-item nav-link">Welcome, {{auth()->user()->fname}}</a>

                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>