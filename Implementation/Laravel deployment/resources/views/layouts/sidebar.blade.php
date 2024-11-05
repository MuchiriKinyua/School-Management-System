<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/accounts') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Accounts</p>
                    </a>
                </li>
                <ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/roles') }}">
            <i class="fas fa-user-shield"></i> Roles
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/permissions') }}">
            <i class="fas fa-lock"></i> Permissions
        </a>
    </li>
</ul>


            </ul>
        </nav>
    </div>
</aside>
