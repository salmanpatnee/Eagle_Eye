<section id="sidebar">
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('hr.expert') ? 'active' : '' }}">
            <a href="{{route('hr.expert')}}">
                <i class='bx bxs-label'></i>
                <div class="MenuTxt">
                    <h3>
                        موارد الخبراء</h3>
                    <span class="text">Expert Resources</span>
                </div>
            </a>
        </li>
    </ul>
</section>
