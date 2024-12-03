<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Student Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{!! route('students') !!}" class="nav-link" aria-current="page" href="#">Students</a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('annoucements') !!}" class="nav-link" aria-current="page" href="#">Announcements</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>
            @if (Route::has('login'))
                @auth
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {!! Auth::user()->first_name.' '. Auth::user()->last_name!!}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{!! route('login.logout') !!}">Logout</a></li>
                            </ul>
                            
                        </li>
                    </ul>
                @else
                <a class="btn btn-outline-success" href="{!! route('login') !!}" >Login</a>
                @endauth
            @endif
            
        </div>
    </div>
</nav>
