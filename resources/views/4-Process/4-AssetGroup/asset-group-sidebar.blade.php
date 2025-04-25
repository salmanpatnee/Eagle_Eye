<style>
       
    .DisabledButton, .MoreButton {
        margin-right: auto;
    }
    .IndiTable .ButtonContainer {
    display: flex;
    gap: 20px;
    justify-content: flex-end;
    margin-right: 30px;
}

    </style>
<section id="sidebar">
    <ul class="side-menu top">
        <li
        class="{{ request()->routeIs('assetgroup.index') || request()->routeIs('assetgroup.show') ? 'active' : '' }}">
        <a href="/asset-group-list">
            <i class='bx bxs-label'></i>
            <div class="MenuTxt">
                <h3>تسجيل مجموعة الأصول</h3>
                <span class="text">Asset Group List</span>
            </div>
        </a>
    </li>
    
        @if (auth()->user()->can('manage-asset'))
        <li class="{{ request()->routeIs('assetgroup.create') || request()->routeIs('assetgroup.edit') ? 'active' : '' }}">
            <a href="/asset-group-input">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>إضافة مجموعة الأصول</h3>
                    <span class="text">Add Asset Group</span>
                </div>
            </a>
        </li>
        @else
            <li>
                <a href="" class="not-allow">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>إضافة مجموعة الأصول</h3>
                        <span class="text">Add Asset Group</span>
                    </div>
                </a>

            </li>
        @endif
    </ul>
</section>
<!-- SIDEBAR -->
