<section id="sidebar">
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('assetreg.index') || request()->routeIs('assetreg.show') ? 'active' : '' }}">
            <a href="{{route('assetreg.index')}}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تسجيل الأصول</h3>
                    <span class="text">Asset Registration</span>
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('assetstatus.index') || request()->routeIs('assetstatus.show') ? 'active' : '' }}">
            <a href="{{route('assetstatus.index')}}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>حالة الأصول</h3>
                    <span class="text">Asset Status</span>
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('assettype.index') || request()->routeIs('assettype.show') ? 'active' : '' }}">
            <a href="{{route('assettype.index')}}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>نوع الأصل</h3>
                    <span class="text">Asset Type</span>
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('assetsubtype.index') || request()->routeIs('assetsubtype.show') ? 'active' : '' }}">
            <a href="{{route('assetsubtype.index')}}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>النوع الفرعي للأصول</h3>
                    <span class="text">Asset Sub-Type</span>
                </div>
                <span class="text"></span>
            </a>
        </li>
    </ul>
</section>
