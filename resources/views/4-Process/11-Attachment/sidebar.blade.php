<section id="sidebar">
    <ul class="side-menu top">
        <li class="active">
            <a href="{{ route('artifacts.index') }}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>قائمة المرفقات</h3>
                    <span class="text">Artifact List</span>
                </div>
            </a>
        </li>
        @if (auth()->user()->can('manage-asset'))
            <li>
                <a href="{{ route('artifacts.create') }}">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>أضف المرفقات</h3>
                        <span class="text">Add Artifact</span>
                    </div>
                </a>
            </li>
        @else
            <li>
                <a href="" class="not-allow">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>أضف المرفقات</h3>
                        <span class="text">Add Artifact</span>
                    </div>
                </a>

            </li>
        @endif


    </ul>
</section>
