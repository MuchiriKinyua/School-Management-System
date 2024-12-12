<!-- menu.blade -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/students') }}" class="nav-link">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>Students</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('/parents/imports') }}" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Parents</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/parent-student') }}" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Parent Student</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('teachers.index') }}" class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>Teachers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.employees.index') }}" class="nav-link {{ Request::is('admin.employees*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i> 
        <p>Employees</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('polls.index') }}" class="nav-link {{ Request::is('polls*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-poll"></i>  
        <p>Polls</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('uploads.index') }}" class="nav-link {{ Request::is('uploads*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cloud-upload-alt"></i>
        <p>Uploads</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('grades.index') }}" class="nav-link {{ Request::is('grades*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>Grades</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('schedules.index') }}" class="nav-link {{ Request::is('schedules*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Schedules</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('breaks.index') }}" class="nav-link {{ Request::is('breaks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coffee"></i>
        <p>Breaks</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('timetable') }}" class="nav-link {{ Request::is('timetables') ? 'active' : '' }}">
        <i class="fas fa-solid fa-table"></i>
        <p>Timetable</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/accounts') }}" class="nav-link">
        <i class="nav-icon fas fa-money-check-alt"></i>
        <p>Accounts</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('prediction.index') }}" class="nav-link">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Prediction</p>
    </a>
</li>

<li class="nav-item has-treeview {{ Request::is('roles*') || Request::is('permissions*') || Request::is('user*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('roles*') || Request::is('permissions*') || Request::is('user*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>
            Users and Controls
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>Roles</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('permissions.index') }}" class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-key"></i>
                <p>Permissions</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
        </li>
    </ul>
</li>