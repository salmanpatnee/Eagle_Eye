<section id="sidebar">
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('threatagent.index') || request()->routeIs('threatagent.show') || request()->routeIs('threatagent.create') || request()->routeIs('threatagent.edit') ? 'active' : '' }}">
            <a href="{{ route('threatagent.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>وكلاء التهديد</h3>
                    <span class="text">Threat Agents</span>
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('threattype.index') || request()->routeIs('threattype.show') || request()->routeIs('threattype.create') || request()->routeIs('threattype.edit') ? 'active' : '' }}">
            <a href="{{ route('threattype.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>نوع وكيل التهديد</h3>
                    <span class="text">Threat Agent Type</span>
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('threatsubtype.index') || request()->routeIs('threatsubtype.show') || request()->routeIs('threatsubtype.create') || request()->routeIs('threatsubtype.edit') ? 'active' : '' }}">
            <a href="{{ route('threatsubtype.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>النوع الفرعي الوكيل التهديد</h3>
                    <span class="text">Threat Agent Sub-Type</span>
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('threatrating.index') || request()->routeIs('threatrating.show') || request()->routeIs('threatrating.create') || request()->routeIs('threatrating.edit') ? 'active' : '' }}">
            <a href="{{ route('threatrating.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>نقاط وكيل التهديد</h3>
                    <span class="text">Threat Agent Rating</span>
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('threatvector.index') || request()->routeIs('threatvector.show') || request()->routeIs('threatvector.create') || request()->routeIs('threatvector.edit') ? 'active' : '' }}">
            <a href="{{ route('threatvector.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>ناقل وكيل التهديد</h3>
                    <span class="text">Threat Agent Vector</span>
                </div>
            </a>
        </li>
    </ul>
</section>
