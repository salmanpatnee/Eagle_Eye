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
    <li class="{{ request()->routeIs('evidences.index') || request()->routeIs('evidences.show') ? 'active' : '' }}">
        <a href="{{ route('evidences.index') }}">
            <i class='bx bxs-dashboard'></i>
            <div class="MenuTxt">
                <h3>تقرير الأدلة</h3>
                <span class="text">Evidence Report</span>
            </div>
        </a>
    </li>
    @if (auth()->user()->can('manage-asset'))
        <li class="{{ request()->routeIs('evidences.edit') || request()->routeIs('evidences.create') ? 'active' : '' }}">
            <a href="{{ route('evidences.create') }}">
                <i class='bx bxs-dashboard'></i>
                <div class="MenuTxt">
                    <h3>تسجيل الأدلة</h3>
                    <span class="text">Record an Evidence</span>
                </div>
            </a>
        </li>
    @else
        <li
            class="{{ request()->routeIs('evidences.edit') || request()->routeIs('evidences.create') ? 'active' : '' }}">
            <a href="{{ route('evidences.create') }}" class="not-allow">
                <i class='bx bxs-dashboard'></i>
                <div class="MenuTxt">
                    <h3>تسجيل الأدلة</h3>
                    <span class="text">Record an Evidence</span>
                </div>
            </a>
        </li>
    @endif

</ul>
