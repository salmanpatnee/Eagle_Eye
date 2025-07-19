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
        class="{{ request()->routeIs('risk-appetites.index') || request()->routeIs('risk-appetites.show') || request()->routeIs('risk-appetites.create') || request()->routeIs('risk-appetites.edit') ? 'active' : '' }}">
        <a href="{{ route('risk-appetites.index') }}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>الرغبة في المخاطرة</h3>
                <span class="text">Risk Appetite</span>
            </div>
        </a>
    </li>
    <li
        class="{{ request()->routeIs('risk-inherent.index') || request()->routeIs('RiskInherent.show') || request()->routeIs('RiskInherent.create') || request()->routeIs('RiskInherent.edit') ? 'active' : '' }}">
        <a href="/risk-inherent-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>خطر كامن</h3>
                <span class="text">Inherent Risk</span>
            </div>
        </a>
    </li>
</ul>
