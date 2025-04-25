<style>
    .text-center {
        text-align: center !important;
    }

    .gap-3 {
        gap: 1rem !important;
    }

    .d-flex {
        display: flex !important;
    }

    .align-items-center {
        align-items: center !important;
    }

    .gap-2 {
        gap: .5rem !important;
    }

    .user-nav {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
        margin-left: auto;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .bg-white {
        background-color: #fff !important;
    }

    .fs-6 {
        font-size: 1rem !important;
    }

    .p-2 {
        padding: .5rem !important;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .bg-info {
        background-color: #6ba8b5 !important;
    }
</style>

<ul class="align-items-center d-flex gap-2 user-nav mt-0">
    @foreach ($roles as $role)
        <li
            class="nav-item fs-6 nav-item rounded-circle p-2 {{ $role->role_name == auth()->user()->role->role_name ? 'bg-white' : 'bg-info' }}">

            <img src="{{ asset('Images/icons/' . $role->icon) }}" class="img-fluid" width="30" height="30"
                alt="{{ $role->role_name }}" title="{{ $role->role_name }} - {{ $role->role_name_ar }}" class="p-2">
        </li>
    @endforeach
</ul>
