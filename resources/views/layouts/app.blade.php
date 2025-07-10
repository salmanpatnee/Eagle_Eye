@include('partials.header')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    @include('partials.sidebar')
    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <!-- Small Device Overlay Start -->
        @include('partials.nav')
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                @include('partials.breadcrumbs')
                <div
                    class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7  dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="mx-auto w-full">
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
                            <div class="flex flex-col gap-5 px-6 mb-4 sm:flex-row sm:items-center sm:justify-end">
                                <div class="flex items-center gap-5">
                                    <x-action.button label="View" label_ar="منظر" />
                                    <x-action.button label="Add" label_ar="يضيف" />
                                    <x-action.button label="Update" label_ar="تحديث" />
                                    <x-action.button label="Delete" label_ar="يمسح" />




                                </div>
                            </div>

                            <div class="max-w-full overflow-x-auto custom-scrollbar">
                                <table class="min-w-full">
                                    <!-- table header start -->
                                    <thead
                                        class="border-gray-100 border-y bg-gray-50 dark:border-gray-800 dark:bg-gray-900 text-left">
                                        <tr>
                                            <x-table.th label="S.No" label_ar="رقم" />
                                            <x-table.th label="Organization ID" label_ar="رمز للجهة" />
                                            <x-table.th label="Organization Name" label_ar="الاسم للجهة" />
                                            <x-table.th label="Contact Number" label_ar="رقم الاتصال" />
                                            <x-table.th label="Email Address" label_ar="عنوان البريد الإلكتروني" />
                                        </tr>
                                    </thead>
                                    <!-- table header end -->

                                    <!-- table body start -->
                                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                        <tr>
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <span
                                                    class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                    1
                                                </span>

                                            </td>
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <span
                                                    class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                    ORG-001
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <span
                                                    class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                    ACME Corporation
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <span
                                                    class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                    00966-55-6612345
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <span
                                                    class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                    acme@abcde.com
                                                </span>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <!-- table body end -->
                                </table>
                            </div>
                        </div>
                        {{-- @yield('content') --}}
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
