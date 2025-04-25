<section id="sidebar">
    <ul class="side-menu top">
        <li
            class="{{ request()->routeIs('va.index') || request()->routeIs('va.show') || request()->routeIs('va.create') || request()->routeIs('va.edit') ? 'active' : '' }}">
            <a href="/va-list">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3> سجل الضعف</h3>
                    <span class="text">Vulnerability Record</span>
                </div>
            </a>
        </li>

        <li
            class="{{ request()->routeIs('vatype.index') || request()->routeIs('vatype.show') || request()->routeIs('vatype.create') || request()->routeIs('vatype.edit') ? 'active' : '' }}">
            <a href="/va-types-list">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>نوع الضعف</h3>
                    <span class="text">Vulnerability Types</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('vasubtype.index') || request()->routeIs('vasubtype.show') || request()->routeIs('vasubtype.create') || request()->routeIs('vasubtype.edit') ? 'active' : '' }}">
            <a href="/va-sub-type-list">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>النوع الفرعي للضعف</h3>
                    <span class="text">Vulnerability Sub-Types</span>
                </div>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->
