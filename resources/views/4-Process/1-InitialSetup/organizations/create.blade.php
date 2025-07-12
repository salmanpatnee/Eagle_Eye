@extends('layouts.app')
@section('title', 'Organization Setup')
@section('title_ar', 'إعداد الجهة')
@section('content')
    <div>
        <x-table.action-wrapper title="New Organization">
            <x-action.button label="All Organizations" label_ar="جميع الجهات" route_name="organizations.index" />
        </x-table.action-wrapper>

        <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
            <!-- Elements -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div>
                    <x-form.label label="Organization ID" label_ar="رمز الجهة" />
                    <input type="text"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                </div>
                <div>
                    <x-form.label label="Organization Name" label_ar="اسم الجهة" />
                    <input type="text"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                </div>
            </div>
        </div>

    </div>
@endsection
