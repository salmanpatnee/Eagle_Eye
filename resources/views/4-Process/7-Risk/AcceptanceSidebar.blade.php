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
        class="{{ request()->routeIs('risk-acceptance.index') || request()->routeIs('risk-acceptance.show') ? 'active' : '' }}">
        <a href="/risk-acceptance-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>تقرير قبول المخاطر</h3>
                <span class="text">Risk Acceptance Report</span>
            </div>
        </a>
    </li>

    @if (auth()->user()->can('manage-asset'))
        <li
            class="{{ request()->routeIs('risk-acceptance.create') || request()->routeIs('risk-acceptance.edit') ? 'active' : '' }}">
            <a href="/risk-acceptance-input">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>إضافة قبول المخاطر</h3>
                    <span class="text">Add Risk Acceptance</span>
                </div>
            </a>
        </li>
    @else
        <li
            class="{{ request()->routeIs('risk-acceptance.create') || request()->routeIs('risk-acceptance.edit') ? 'active' : '' }}">
            <a href="/risk-acceptance-input" class="not-allow">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>إضافة قبول المخاطر</h3>
                    <span class="text">Add Risk Acceptance</span>
                </div>
            </a>
        </li>
    @endif



</ul>
