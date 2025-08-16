@push('css')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400;500;600;700;800;900&display=swap");

        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url('{{ asset('fonts/DejaVuSans.ttf') }}') format('truetype');
        }

        .report {
            direction: rtl;
        }

        th p,
        td p {
            font-size: 12px;
            line-height: 1.5em;
        }

        table,
        tr,
        th,
        td {
            border-collapse: collapse;
            padding: .5em;
        }

        td {
            border: 1px solid black;
        }

        .bg-light-gray {
            background-color: #F2F2F2 !important;
        }

        .bg-blue {
            background-color: #2C3A83 !important;
        }

        .bg-teal {
            background-color: #00b9ac !important;
        }

        .bg-dark {
            background-color: #363c48 !important;
        }

        .bg-aqua {
            background-color: #E2FAFC !important
        }

        .bg-green {
            background-color: #92D14F !important;
        }

        .be-blue {
            border-bottom-color: #2C3A83;
        }

        .be-teal {
            border-bottom-color: teal;
        }

        .be-dark {
            border-bottom-color: #363c48;
        }

        .text-light {
            color: #fff;
        }

        /* Prevent page breaks inside tables */
        table {
            page-break-inside: auto;
            width: 100%;
            /* Ensure table width is appropriate */
        }

        /* Prevent page breaks inside table rows */
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        /* Prevent page breaks inside divs */
        div {
            page-break-inside: avoid;
        }

        /* Force page breaks before specific elements if needed */
        .page-break {
            page-break-before: always;
        }

        .tr-border-0,
        .tr-border-0 th,
        .tr-border-0 td {
            border: none
        }

        th {
            padding: .5em;
            font-weight: bold;
        }

        th,
        .bordered {
            border: 1px solid black;
        }

        td {
            padding: .5em;
            text-align: center;
        }

        th.description {
            /* text-align: left; */
            width: 230px;

        }
    </style>
@endpush
@include('partials.header')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <!-- Small Device Overlay Start -->
        @include('partials.nav')
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                @include('partials.breadcrumbs')
                <div
                    class="min-h-screen rounded-lg border border-gray-200 bg-white p-4  dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="mx-auto w-full">


                        @if (session('error'))
                            <x-alert-error>
                                {{ session('error') }}
                            </x-alert-error>
                        @endif
                        @if (session('success'))
                            <x-alert-success>
                                {{ session('success') }}
                            </x-alert-success>
                        @endif

                        @yield('actions')
                        <div
                            class="relative max-w-full overflow-x-auto   rounded-lg border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
                            <header class="text-center my-12 mb-5   ">
                                @if ($organizationData)
                                    <img src="{{ asset('storage/' . $organizationData?->organization_logo) }}"
                                        alt="Organization Logo" width="250" class="mb-6 mx-auto">

                                    <p class="font-bold rtl:text-right text-2xl text-gray-900 mb-2" lang="ar"
                                        dir="rtl">
                                        {{ $organizationData->organization_name_arabic }}</p>

                                    <p class="font-bold rtl:text-right text-2xl text-gray-900 mb-2">
                                        {{ $organizationData->organization_name_english }}
                                    </p>

                                    <p class="font-bold rtl:text-right text-2xl text-gray-900 mb-2" lang="ar"
                                        dir="rtl">
                                        تقييم الضوابط</p>
                                    @yield('report-info')

                                    <p class="text-lg text-gray-900 mb-0">Current Date: {{ now()->format('d-m-Y') }}</p>
                                @endif
                            </header>
                            @yield('content')
                        </div>

                    </div>
                </div>

            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->
@include('partials.footer')
