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
    {{-- <li
        class="{{ request()->routeIs('kpi-categories.index') || request()->routeIs('kpi-categories.show') || request()->routeIs('kpi-categories.create') || request()->routeIs('kpi-categories.edit') ? 'active' : '' }}">
        <a href="{{route('kpi-categories.index')}}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>مؤشرات الأداء الرئيسية</h3>
                <span class="text">KPI Categories</span>
            </div>
        </a>
    </li> --}}
    <li
        class="{{ request()->routeIs('kpi-standards.index') || request()->routeIs('kpi-standards.show') || request()->routeIs('kpi-standards.create') || request()->routeIs('kpi-standards.edit') ? 'active' : '' }}">
        <a href="{{route('kpi-standards.index')}}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>معيار مؤشرات الأداء الرئيسية</h3>
                <span class="text">KPI Standards</span>
            </div>
        </a>
    </li>

    <li
    class="{{ request()->routeIs('kpi-references.index') || request()->routeIs('kpi-standards-report.show') ? 'active' : '' }}">
    <a href="{{route('kpi-references.index')}}">
        <i class='bx bxs-label'></i>
        <div class="MenuTxt">
            <h3> قياسي مؤشرات الأداء الرئيسية</h3>
            <span class="text">KPI Standard Report</span>
        </div>
    </a>
</li>
</ul>
