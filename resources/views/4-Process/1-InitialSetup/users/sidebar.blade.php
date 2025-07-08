<section id="sidebar">
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('users.index') || request()->routeIs('users.show') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>المستخدمين</h3>
                    <span class="text">Users List</span>
                </div>
            </a>
        </li>
        @if (auth()->user()->can('manage-asset'))
            <li class="{{ request()->routeIs('users.create') || request()->routeIs('users.edit') ? 'active' : '' }}">
                <a href="{{ route('users.create') }}">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>إضافة مستخدم</h3>
                        <span class="text">Add User</span>
                    </div>
                </a>
            </li>
        @else
            <li class="{{ request()->routeIs('users.create') || request()->routeIs('users.edit') ? 'active' : '' }}">
                <a href="{{ route('users.create') }}" class="not-allow">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>إضافة مستخدم</h3>
                        <span class="text">Add User</span>
                    </div>
                </a>
            </li>
        @endif
    </ul>
</section>
