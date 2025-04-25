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
        class="{{ request()->routeIs('pen-test.index') || request()->routeIs('pen-test.show') || request()->routeIs('pen-test.create') || request()->routeIs('pen-test.edit') ? 'active' : '' }}">
        <a href="{{ route('pen-test.index') }}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>
                    اختبار اختراق الثغرات</h3>
                <span class="text">Vulnerability Penetration Test</span>
            </div>
        </a>
    </li>
    {{-- <li
        class="{{ request()->routeIs('pen-test-findings.index') || request()->routeIs('pen-test-findings.show') || request()->routeIs('pen-test-findings.create') || request()->routeIs('pen-test-findings.edit') ? 'active' : '' }}">
        <a href="{{ route('pen-test-findings.index') }}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>
                    نتائج اختبار اختراق الثغرات </h3>
                <span class="text">Penetration Test Findings</span>
            </div>
        </a>
    </li> --}}


    <li
        class="{{ request()->routeIs('patch.index') || request()->routeIs('patch.show') || request()->routeIs('patch.create') || request()->routeIs('patch.edit') ? 'active' : '' }}">
        <a href="{{ route('patch.index') }}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>
                    تصحيح</h3>
                <span class="text">Patch</span>
            </div>
        </a>
    </li>

    <li
        class="{{ request()->routeIs('third-party.index') || request()->routeIs('third-party.show') || request()->routeIs('third-party.create') || request()->routeIs('third-party.edit') ? 'active' : '' }}">
        <a href="{{ route('third-party.index') }}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>
                    الطرف الثالث</h3>
                <span class="text">Third Party</span>
            </div>
        </a>
    </li>

    <li
        class="{{ request()->routeIs('tpt-experts.index') || request()->routeIs('tpt-experts.show') || request()->routeIs('tpt-experts.create') || request()->routeIs('tpt-experts.edit') ? 'active' : '' }}">
        <a href="{{ route('tpt-experts.index') }}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>
                    خبير الطرف الثالث</h3>
                <span class="text">Third Party Experties</span>
            </div>
        </a>
    </li>

</ul>
