<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

       <div class="col">
<a class="navbar-brand" href="#">Laravel Book Store </a>
       </div>
       <div class="col">
       <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: inline;">
            <ul class="nav navbar-nav">
                {{-- <li><a class="nav-link {{ Request :: is('/') ? " active" : "" }}" href="/">Home</a></li>
                <li><a class="nav-link {{ Request :: is('blog') ? " active" : "" }}" href="blog">Blog</a></li>
                <li><a class="nav-link {{ Request :: is('about') ? " active" : "" }}" href="{{ route('blog.about') }}">About</a>
                </li>
                <li><a class="nav-link {{Request::is('contact')?" active":"" }}" href="/contact">Contact</a></li> --}}
                @if(Auth::check())
                <li class="nav-item dropdown" style="margin-left: 8in;">
                    <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="{{Auth::user()->getAvatarUrlAttribute(Auth::user()->avatar)}}" alt="" style="border-radius: 50%;vertical-align: middle;
                                                width: 35px;
                                                height: 35px;"><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a></li>
                        @if(Auth::user()->role == 'user')
                        <li><a class="dropdown-item" href="{{ route('my_orders') }}">MY Orders</a></li>
                        @endif
                        @if(Auth::user()->role == 'admin')
                        <li><a class="dropdown-item" href="{{ route('home') }}">Dashboard</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('signout')}}">Logout</a></li>
                    </ul>
                </li>
                @else
                <div class="row" style="justify-content: end; margin-left: 5in;">
                    <div class="col-md-5">
                        <a href="{{ route('login')}}" method='POST' class="btn btn-primary btn-sm">Login</a>
                    </div>
                    <div class="col-md-4">

                        <a href="{{ route('register')}}" class="btn btn-primary btn-sm">Register</a>
                    </div>
                </div>

                @endif
            </ul>

        </div>
        </div>
    </div>
</nav>
