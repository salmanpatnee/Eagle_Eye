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
            class="{{ request()->routeIs('assetstatus.index') || request()->routeIs('assetstatus.show') || request()->routeIs('assetstatus.create') || request()->routeIs('assetstatus.edit') ? 'active' : '' }}">
            <a href="{{ route('assetstatus.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>حالة الأصول</h3>
                    <span class="text">Asset Status</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('assettype.index') || request()->routeIs('assettype.show') || request()->routeIs('assettype.create') || request()->routeIs('assettype.edit') ? 'active' : '' }}">
            <a href="{{ route('assettype.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>نوع الأصل</h3>
                    <span class="text">Asset Type</span>
                </div>
            </a>
        </li>
        <li
            class="{{ request()->routeIs('assetsubtype.index') || request()->routeIs('assetsubtype.show') || request()->routeIs('assetsubtype.create') || request()->routeIs('assetsubtype.edit') ? 'active' : '' }}">
            <a href="{{ route('assetsubtype.index') }}">
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
