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
        class="{{ request()->routeIs('riskmaster.index') || request()->routeIs('riskmaster.show') || request()->routeIs('riskmaster.create') || request()->routeIs('riskmaster.edit') ? 'active' : '' }}">
        <a href="/risk-identification-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>تحديد المخاطر</h3>
                <span class="text">Risk Identification</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('risk-methodology.index') || request()->routeIs('risk-methodology.show') || request()->routeIs('risk-methodology.create') || request()->routeIs('risk-methodology.edit') ? 'active' : '' }}">
        <a href="{{ route('risk-methodology.index') }}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>منهجية المخاطر</h3>
                <span class="text">Risk Methodology</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('riskgroup.index') || request()->routeIs('riskgroup.show') || request()->routeIs('riskgroup.create') || request()->routeIs('riskgroup.edit') ? 'active' : '' }}">
        <a href="/risk-group-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>مجموعة المخاطر</h3>
                <span class="text">Risk Group</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('risktype.index') || request()->routeIs('risktype.show') || request()->routeIs('risktype.create') || request()->routeIs('risktype.edit') ? 'active' : '' }}">
        <a href="/risk-type-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>نوع المخاطرة</h3>
                <span class="text">Risk Type</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('risksubtype.index') || request()->routeIs('risksubtype.show') || request()->routeIs('risksubtype.create') || request()->routeIs('risksubtype.edit') ? 'active' : '' }}">
        <a href="/risk-sub-type-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>النوع الفرعي للمخاطر</h3>
                <span class="text">Risk Sub-Type</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('riskkri.index') || request()->routeIs('riskkri.show') || request()->routeIs('riskkri.create') || request()->routeIs('riskkri.edit') ? 'active' : '' }}">
        <a href="/kri-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>مؤشرات المخاطر الرئيسية</h3>
                <span class="text">Key Risk Indicators</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('riskkpi.index') || request()->routeIs('riskkpi.show') || request()->routeIs('riskkpi.create') || request()->routeIs('riskkpi.edit') ? 'active' : '' }}">
        <a href="/kpi-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>مؤشرات الأداء الرئيسية</h3>
                <span class="text">Key Performance Indicators</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('risktreatment.index') || request()->routeIs('risktreatment.show') || request()->routeIs('risktreatment.create') || request()->routeIs('risktreatment.edit') ? 'active' : '' }}">
        <a href="/risk-treatment-option-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>خيارات علاج المخاطر</h3>
                <span class="text">Risk Treatment Options</span>
            </div>
        </a>
    </li>
</ul>
