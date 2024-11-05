<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @if(auth()->check())
                    {{-- Role-based dynamic links --}}
                    @foreach(auth()->user()->getRoleNames() as $role)
                        <li class="nav-item">
                            <span class="nav-link role-badge">{{ $role }}</span>
                        </li>
                    @endforeach
                @endif
            </ul>

            <ul class="navbar-nav ms-auto">
                @if(auth()->check())
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="https://assets.infyom.com/logo/blue_logo_150x150.png" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <li class="user-header bg-primary">
                                <img src="https://assets.infyom.com/logo/blue_logo_150x150.png" class="img-circle elevation-2" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <a href="{{ url('/profile') }}" class="btn btn-default btn-flat">Profile</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline float-right">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Logout</button>
                                </form>
                            </li>
                        </ul>
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
    </div>
</nav>
