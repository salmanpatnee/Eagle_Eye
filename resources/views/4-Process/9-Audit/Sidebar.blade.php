<style>
    .IndiTable .ButtonContainer {
        gap: 10px;
        margin-right: 30px;
    }

    .MoreButton,
    .DisabledButton,
    .RightButton {
        margin-right: auto;
    }
</style>
<ul class="side-menu top">
    <li
        class="{{ request()->routeIs('audits.index') || request()->routeIs('audits.show') || request()->routeIs('audits.create') || request()->routeIs('audits.edit') ? 'active' : '' }}">
        <a href="/audit-plan-list">
            <i class='bx bxs-dashboard'></i>
            <div class="MenuTxt">
                <h3>تخطيط مراجعة</h3>
                <span class="text">Audit Planning</span>
            </div>
        </a>
    </li>
    <li class="{{ request()->routeIs('auditors.index') || request()->routeIs('auditors.show') || request()->routeIs('auditors.create') || request()->routeIs('auditors.edit') ? 'active' : '' }}">
        <a href="/auditor-list">
            <i class='bx bxs-doughnut-chart'></i>
            <div class="MenuTxt">
                <h3>المراجع</h3>
                <span class="text">Auditors</span>
            </div>
        </a>
    </li>
    <li class="{{ request()->routeIs('auditees.index') || request()->routeIs('auditees.show') || request()->routeIs('auditees.create') || request()->routeIs('auditees.edit') ? 'active' : '' }}">
        <a href="/auditee-list">
            <i class='bx bxs-doughnut-chart'></i>
            <div class="MenuTxt">
                <h3>مراجعة التفاصيل</h3>
                <span class="text">Auditee Details</span>
            </div>
        </a>
    </li>
</ul>
