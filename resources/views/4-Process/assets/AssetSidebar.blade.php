<section id="sidebar">
    <ul class="side-menu top">
        <li
            class="{{ request()->routeIs('assets.index') || request()->routeIs('assets.show') || request()->routeIs('assets.create') || request()->routeIs('assets.edit') ? 'active' : '' }}">
            <a href="{{ route('assets.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تسجيل الأصول</h3>
                    <span class="text">Asset Registration</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('asset-status.index') || request()->routeIs('asset-status.show') || request()->routeIs('asset-status.create') || request()->routeIs('asset-status.edit') ? 'active' : '' }}">
            <a href="{{ route('asset-status.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>حالة الأصول</h3>
                    <span class="text">Asset Status</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('asset-types.index') || request()->routeIs('asset-types.show') || request()->routeIs('asset-types.create') || request()->routeIs('asset-types.edit') ? 'active' : '' }}">
            <a href="{{ route('asset-types.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>نوع الأصل</h3>
                    <span class="text">Asset Type</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('asset-sub-types.index') || request()->routeIs('asset-sub-types.show') || request()->routeIs('asset-sub-types.create') || request()->routeIs('asset-sub-types.edit') ? 'active' : '' }}">
            <a href="{{ route('asset-sub-types.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>النوع الفرعي للأصول</h3>
                    <span class="text">Asset Sub-Type</span>
                </div>
                <span class="text"></span>
            </a>
        </li>
        <li>
            <a href="{{ asset('templates/asset_register_template.xlsx') }}" download="">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تحميل قالب اكسل</h3>
                    <span class="text">Download Excel Data Template</span>
                </div>
                <span class="text"></span>
            </a>
        </li>
        <li class="{{ request()->routeIs('upload.assets.create') ? 'active' : '' }}">
            <a href="{{ route('upload.assets.create') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>تحميل بيانات الأصول</h3>
                    <span class="text">Upload Asset Data</span>
                </div>
                <span class="text"></span>
            </a>
        </li>
    </ul>
</section>
