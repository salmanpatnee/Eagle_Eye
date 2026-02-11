@extends('layouts.app-full')
@section('title', 'Control Smart Search')
{{-- @section('title_ar', 'الضوابط في البحث الذكي') --}}
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
                        <x-form.select label="Controls"  name="control_name" :value="$controlId"
                            :custom_data="$controlIds" onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Classification"  name="classification" :value="$classification"
                            :data="$classifications" id_key="classification_id" value_key="classification_name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Relationships"  name="relation" :value="$relation"
                            :data="$relations" id_key="relation_id" value_key="relation_name" onchange="this.form.submit()"
                            hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Categories"  name="category" :value="$category" :data="$categories"
                            onchange="this.form.submit()" id_key="category_id" value_key="category_name" hide_keys="true" />
                    </div>
                </x-form.grid-4-col>
                <x-form.grid-4-col>
                    <div>
                        <x-form.select label="Control Types" name="type" :value="$type"
                            :data="$types" id_key="control_type_id" value_key="control_type_name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Best Practices"  name="practice" :value="$practice"
                            :data="$practices" id_key="best_practice_id" value_key="best_practice_name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Main Domains" name="domain" :value="$domain"
                            :data="$domains" id_key="main_domain_id" value_key="main_domain_name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Sub Domains"  name="subdomain" :value="$subdomain"
                            :data="$subDomains" onchange="this.form.submit()" id_key="sub_domain_id"
                            value_key="sub_domain_name" hide_keys="true" />
                    </div>
                </x-form.grid-4-col>
            </div>
        </form>

        <!-- Data Table with Sticky Header -->
        <div class="mt-6 border border-gray-200" style="max-height: 350px; overflow: auto;">
            <div>
                <table class="w-full" style="border-collapse: collapse; vertical-align: top;">
                    <thead style="position: sticky; top: 0; z-index: 50;">
                        <tr style="background-color: #00053C;">
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white" style="width: 60px; background-color: #00053C; vertical-align: top;">S.No</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white" style="background-color: #00053C; vertical-align: top;">Control</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white" style="background-color: #00053C; vertical-align: top;">Sub-Domain</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white" style="background-color: #00053C; vertical-align: top;">Domain</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white" style="background-color: #00053C; vertical-align: top;">Best Practice</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white" style="background-color: #00053C; vertical-align: top;">Control Type</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white" style="background-color: #00053C; vertical-align: top;">Category</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white" style="background-color: #00053C; vertical-align: top;">Classification</th>
                            
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($controls as $control)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                 <td class="px-4 py-3 text-center whitespace-nowrap" style="width: 60px; vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ ($controls->currentPage() - 1) * $controls->perPage() + $loop->index + 1 }}</span>
                                </td>
                                 <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <a href="{{ route('controls.show', $control->id) }}" class="text-blue-600 hover:underline">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $control->control_id }} - {{ $control->control_name }}</span>
                                </a>
                                </td>
                               

                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $control->sub_domain_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $control->main_domain_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $control->best_practice_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $control->control_type_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $control->category_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $control->classification_name }}</span>
                                </td>
                               
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                                    No controls found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <x-pagination>
            {{ $controls->links() }}
        </x-pagination>


    </div>
@endsection
