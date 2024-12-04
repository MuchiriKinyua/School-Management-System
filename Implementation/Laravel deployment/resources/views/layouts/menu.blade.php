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
