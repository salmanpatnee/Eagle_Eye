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
        class="{{ request()->routeIs('objectives.index') || request()->routeIs('objectives.show') || request()->routeIs('objectives.create') || request()->routeIs('objectives.edit') ? 'active' : '' }}">
        <a href="{{ route('objectives.index') }}">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>
                    أهداف</h3>
                <span class="text">Objectives</span>
            </div>
        </a>
    </li>

</ul>
