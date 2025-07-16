<section id="sidebar">
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('owners.index') || request()->routeIs('owners.show') ? 'active' : '' }}">
            <a href="/owners">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تسجيل مالك</h3>
                    <span class="text">Owner Registration</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('owner-roles.index') || request()->routeIs('owner-roles.show') ? 'active' : '' }}">
            <a href="/owner-roles">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>دور الصاحب</h3>
                    <span class="text">Owner Roles</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('custodians.index') || request()->routeIs('custodians.show') ? 'active' : '' }}">
            <a href="/custodians">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تسجيل الوصي</h3>
                    <span class="text">Custodian Registration</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('custodianrole.index') || request()->routeIs('custodianrole.show') ? 'active' : '' }}">
            <a href="/custodian-role-list">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>دور الوصي</h3>
                    <span class="text">Custodian Roles</span>
                </div>
            </a>
        </li>
    </ul>
</section>
