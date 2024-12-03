<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/css/style.css') !!}">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    @auth('admin')    
                    <a href="#">{!! Auth::guard('admin')->user()->first_name !!}</a>
                    @endauth
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{!! route('admin.teachers') !!}" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Teachers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{!! route('admin.annoucements') !!}" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Announcements</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{!! route('admin.students') !!}" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Students</span>
                    </a>
                </li>
                <!-- Add more items dynamically if needed -->
                <li class="sidebar-item">
                    <a href="{!! route('admin.auth.logout') !!}" class="sidebar-link">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main p-3">
            @yield('content') <!-- Dynamic Content Here -->
        </div>
    </div>

    <script src="{!! asset('assets/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/js/script.js') !!}"></script>
</body>
</html>
