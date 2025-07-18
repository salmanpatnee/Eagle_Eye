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
            {{-- <li>
                <a href="{{ asset('templates/custodian_name_template.xlsx') }}" download="">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>تحميل قالب اكسل</h3>
                        <span class="text">Download Excel Data Template</span>
                    </div>
                    <span class="text"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('upload.artifact.create') ? 'active' : '' }}">
                <a href="{{ route('upload.artifact.create') }}">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>تحميل بيانات القطع الأثرية/h3>
                        <span class="text">Upload Artifact Data</span>
                    </div>
                    <span class="text"></span>
                </a>
            </li> --}}
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
