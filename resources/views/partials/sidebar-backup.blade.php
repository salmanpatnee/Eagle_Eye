<!-- SIDEBAR -->
<section id="sidebar">
    @include('partials.header')
    <ul class="side-menu top">
        <li>
            <a href="/organizations">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Organization</span>
            </a>
        </li>
        <li>
            <a href="/location-list">
                <i class='bx bxs-report'></i>
                <span class="text">Location</span>
            </a>
        </li>
        <li>
            <a href="/department-list">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Department</span>
            </a>
        </li>
        <li>
            <a href="/sub-department-list">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Sub-Department</span>
            </a>
        </li>
        <li>
            <a href="/classification-list">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Classification</span>
            </a>
        </li>
        <li>
            <a href="/category-list">
                <i class='bx bx-box'></i>
                <span class="text">Category</span>
            </a>
        </li>
        <li>
            <a href="/sub-category-list">
                <i class='bx bx-box'></i>
                <span class="text">Sub-Category</span>
            </a>
        </li>
        <li>
            <a href="/best-practice-list">
                <i class='bx bx-box'></i>
                <span class="text">Best Practices</span>
            </a>
        </li>
        <li>
            <a href="/main-domain-list">
                <i class='bx bx-box'></i>
                <span class="text">Domains List</span>
            </a>
        </li>
        <li>
            <a href="/sub-domain-list">
                <i class='bx bx-box'></i>
                <span class="text">Sub-Domains List</span>
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}">
                <i class='bx bx-user'></i>
                <span class="text">Users</span>
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}">
                <i class='bx bx-user'></i>
                <span class="text">Options</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->
