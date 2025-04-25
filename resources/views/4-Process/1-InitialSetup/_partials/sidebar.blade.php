<section id="sidebar">
    <ul class="side-menu top">
        <li
            class="{{ request()->routeIs('organizations.index') || request()->routeIs('organizations.show') || request()->routeIs('organizations.create') || request()->routeIs('organizations.edit') ? 'active' : '' }}">
            <a href="{{ route('organizations.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>إعداد الجهة</h3>
                    <span class="text">Organization</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('locations.index') || request()->routeIs('locations.show') || request()->routeIs('locations.create') || request()->routeIs('locations.edit') ? 'active' : '' }}">
            <a href="{{ route('locations.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>الموقع</h3>
                    <span class="text">Location</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('departments.index') || request()->routeIs('departments.show') || request()->routeIs('departments.create') || request()->routeIs('departments.edit') ? 'active' : '' }}">
            <a href="{{ route('departments.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>قسم</h3>
                    <span class="text">Department</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('sub-departments.index') || request()->routeIs('sub-departments.show') || request()->routeIs('sub-departments.create') || request()->routeIs('sub-departments.edit') ? 'active' : '' }}">
            <a href="{{ route('sub-departments.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>قسم فرعى</h3>
                    <span class="text">Sub-Department</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('classifications.index') || request()->routeIs('classifications.show') || request()->routeIs('classifications.create') || request()->routeIs('classifications.edit') ? 'active' : '' }}">
            <a href="{{ route('classifications.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تصنيف</h3>
                    <span class="text">Classification</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('categories.index') || request()->routeIs('categories.show') || request()->routeIs('categories.create') || request()->routeIs('categories.edit') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>فئة</h3>
                    <span class="text">Category</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('sub-categories.index') || request()->routeIs('sub-categories.show') || request()->routeIs('sub-categories.create') || request()->routeIs('sub-categories.edit') ? 'active' : '' }}">
            <a href="{{ route('sub-categories.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تصنيف فرعي</h3>
                    <span class="text">Sub-Category</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('best-practices.index') || request()->routeIs('best-practices.show') || request()->routeIs('best-practices.create') || request()->routeIs('best-practices.edit') ? 'active' : '' }}">
            <a href="{{ route('best-practices.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>أفضل الممارسات</h3>
                    <span class="text">Best Practices</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('domains.index') || request()->routeIs('domains.show') || request()->routeIs('domains.create') || request()->routeIs('domains.edit') ? 'active' : '' }}">
            <a href="{{ route('domains.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>قائمة المجالات</h3>
                    <span class="text">Domains List</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('sub-domains.index') || request()->routeIs('sub-domains.show') || request()->routeIs('sub-domains.create') || request()->routeIs('sub-domains.edit') ? 'active' : '' }}">
            <a href="{{ route('sub-domains.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>قائمة النطاقات الفرعية</h3>
                    <span class="text">Sub-Domains List</span>
                </div>
            </a>
        </li>

        <li class="{{ request()->routeIs('ownerreg.index') || request()->routeIs('ownerreg.show') || request()->routeIs('ownerreg.create') || request()->routeIs('ownerreg.edit') ? 'active' : '' }}">
            <a href="/owner-list">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تسجيل مالك</h3>
                    <span class="text">Owner Registration</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('ownerrole.index') || request()->routeIs('ownerrole.show') || request()->routeIs('ownerrole.edit') || request()->routeIs('ownerrole.create') ? 'active' : '' }}">
            <a href="/owner-role-list">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>دور الصاحب</h3>
                    <span class="text">Owner Roles</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('custodian.index') || request()->routeIs('custodian.show') || request()->routeIs('custodian.edit') || request()->routeIs('custodian.create') ? 'active' : '' }}">
            <a href="/custodian-list">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تسجيل الوصي</h3>
                    <span class="text">Custodian Registration</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('custodianrole.index') || request()->routeIs('custodianrole.show') || request()->routeIs('custodianrole.create') || request()->routeIs('custodianrole.edit') ? 'active' : '' }}">
            <a href="/custodian-role-list">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>دور الوصي</h3>
                    <span class="text">Custodian Roles</span>
                </div>
            </a>
        </li>

        {{-- <li
            class="{{ request()->routeIs('users.index') || request()->routeIs('users.show') || request()->routeIs('users.create') || request()->routeIs('users.edit') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>المستخدمين</h3>
                    <span class="text">Users</span>
                </div>
            </a>
        </li> --}}

        @if (auth()->user()->id == 1)
            <li
                class="{{ request()->routeIs('options.create') || request()->routeIs('options.update') ? 'active' : '' }}">
                <a href="{{ route('options.create') }}">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>إعدادات</h3>
                        <span class="text">Options</span>
                    </div>
                </a>
            </li>
        @endif
    </ul>
</section>
