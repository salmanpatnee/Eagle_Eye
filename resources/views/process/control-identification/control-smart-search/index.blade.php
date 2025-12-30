@extends('layouts.app-full')
@section('title', 'Control Smart Search')
@section('title_ar', 'الضوابط في البحث الذكي')
@section('content')
@push('css')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush

    <div>
        <x-table.action-wrapper title="Control Smart Search" />

        <form action="{{ route('control-smart-search.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-4-col>
                    <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control_name" :value="$controlId"
                            :custom_data="$controlIds" onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Classification" label_ar="التصنيف" name="classification" :value="$classification"
                            :data="$classifications" id_key="classification_id" value_key="classification_name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Relationships" label_ar="علاقة" name="relation" :value="$relation"
                            :data="$relations" id_key="relation_id" value_key="relation_name" onchange="this.form.submit()"
                            hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Categories" label_ar="فئة" name="category" :value="$category" :data="$categories"
                            onchange="this.form.submit()" id_key="category_id" value_key="category_name" hide_keys="true" />
                    </div>
                </x-form.grid-4-col>
                <x-form.grid-4-col>
                    <div>
                        <x-form.select label="Control Types" label_ar="نوع الضابط" name="type" :value="$type"
                            :data="$types" id_key="control_type_id" value_key="control_type_name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Best Practices" label_ar="أفضل الممارسات" name="practice" :value="$practice"
                            :data="$practices" id_key="best_practice_id" value_key="best_practice_name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Main Domains" label_ar="المكون الأساسي" name="domain" :value="$domain"
                            :data="$domains" id_key="main_domain_id" value_key="main_domain_name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Sub Domains" label_ar="المكون الفرعي" name="subdomain" :value="$subdomain"
                            :data="$subDomains" onchange="this.form.submit()" id_key="sub_domain_id"
                            value_key="sub_domain_name" hide_keys="true" />
                    </div>
                </x-form.grid-4-col>
            </div>
        </form>

        <!-- Scrollable table container with fixed height, inner scroll and always visible scrollbar -->
        <div class="relative">
            <!-- Left fade effect -->
            <div class="pointer-events-none absolute inset-y-0 left-0 z-10 hidden w-24 lg:block">
                <div class="h-full w-full bg-gradient-to-r from-white dark:from-gray-800 to-transparent"></div>
            </div>

            <!-- Right fade effect -->
            <div class="pointer-events-none absolute inset-y-0 right-0 z-10 hidden w-24 lg:block">
                <div class="h-full w-full bg-gradient-to-l from-white dark:from-gray-800 to-transparent"></div>
            </div>

            <div class="overflow-x-auto overflow-y-auto max-h-[350px] custom-scrollbar">
                <x-table.table>
                    <x-table.thead class="sticky top-0 z-20 !bg-brand-950 !border-brand-500 !border-y !text-left">
                        <x-table.th label="S.No" label_ar="رقم" />
                        <x-table.th label="Sub-Domain" label_ar="المكون الفرعي" />
                        <x-table.th label="Domain" label_ar="المكون الأساسي" />
                        <x-table.th label="Best Practice" label_ar="أفضل الممارسات" />
                        <x-table.th label="Control Type" label_ar="نوع الضابط" />
                        <x-table.th label="Category" label_ar="فئة" />
                        <x-table.th label="Classification" label_ar="التصنيف" />
                        <x-table.th label="Control" label_ar=" الضوابط" />
                    </x-table.thead>
                    <x-table.tbody>
                        @forelse ($controls as $control)
                            <tr>
                                <x-table.td><x-table.serial :loop="$loop" :paginator="$controls" /></x-table.td>
                                <x-table.td> {{ $control->sub_domain_name }}</x-table.td>
                                <x-table.td> {{ $control->main_domain_name }}</x-table.td>
                                <x-table.td> {{ $control->best_practice_name }}</x-table.td>
                                <x-table.td> {{ $control->control_type_name }}</x-table.td>
                                <x-table.td> {{ $control->category_name }}</x-table.td>
                                <x-table.td> {{ $control->classification_name }}</x-table.td>
                                <x-table.td> {{ $control->control_id }} - {{ $control->control_name }}</x-table.td>
                            </tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>
            </div>
        </div>

        @push('css')
        <style>
        .custom-scrollbar::-webkit-scrollbar {
            height: 12px;
            width: 12px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
        </style>
        @endpush

        <x-pagination>
            {{ $controls->links() }}
        </x-pagination>


    </div>
@endsection
