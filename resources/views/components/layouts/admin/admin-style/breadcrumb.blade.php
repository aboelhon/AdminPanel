@if (Request::is('admin/admin/*'))
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.add-admin') }}">Admin New Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.all-admins') }}">All Admins</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.deleted-admins') }}">Deleted Admins</a>
        </li>
    </ul>
@elseif (Request::is('admin/supervisor/*'))
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.add-supervisor') }}">Admin New Supervisor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.all-supervisors') }}">All Supervisors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.deleted-supervisors') }}">Deleted Supervisors</a>
        </li>
    </ul>
@elseif (Request::is('admin/member/*'))
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.add-member') }}">Add New Member</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.all-members') }}">All Members</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.deleted-members') }}">Deleted Members</a>
        </li>
    </ul>
@endif
