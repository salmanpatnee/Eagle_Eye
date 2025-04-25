<style>
    .IndiTable .ButtonContainer {
        gap: 10px;
        margin-right: 30px;
    }

    .MoreButton,
    .DisabledButton, .RightButton {
        margin-right: auto;
    }
</style>
<ul class="side-menu top">
    <li
        class="{{ request()->routeIs('controlmaster.index') || request()->routeIs('controlmaster.show') || request()->routeIs('controlmaster.create') || request()->routeIs('controlmaster.edit') ? 'active' : '' }}">
        <a href="/control-identification-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>تحديد الضوابط</h3>
                <span class="text">Control Identification</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('controltype.index') || request()->routeIs('controltype.show') || request()->routeIs('controltype.create') || request()->routeIs('controltype.edit') ? 'active' : '' }}">
        <a href="/control-type-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>نوع الضوابط</h3>
                <span class="text">Control Type</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('kpi-standards.index') || request()->routeIs('kpi-standards.show') || request()->routeIs('kpi-standards.create') || request()->routeIs('kpi-standards.edit') ? 'active' : '' }}">
        <a href="{{route('kpi-standards.index')}}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>مؤشرات الأداء الرئيسية الضوابط</h3>
                <span class="text">Control KPIs</span>
            </div>
        </a>
    </li>
</ul>
