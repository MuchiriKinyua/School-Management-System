<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
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
    <a href="{{ route('teachers.index') }}" class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>Teachers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('timetable') }}" class="nav-link {{ Request::is('timetables') ? 'active' : '' }}">
    <i class=" fas fa-solid fa-table"></i>
        <p>Timetable</p>
    </a>
</li>
