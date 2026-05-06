@extends('layouts.app-full')
@section('title', 'Control Smart Search')
@section('title_ar', 'الضوابط في البحث الذكي')
@section('content')
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
                            :data="$practices" id_key="best_practices_id" value_key="best_practices_name"
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

        <x-table.scroll-table height-offset="300" min-width="1100px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Sub-Domain" label_ar="المكون الفرعي" />
                <x-table.th label="Domain" label_ar="المكون الأساسي" />
                <x-table.th label="Best Practice" label_ar="أفضل الممارسات" />
                <x-table.th label="Control Type" label_ar="نوع الضابط" />
                <x-table.th label="Category" label_ar="فئة" />
                <x-table.th label="Classification" label_ar="التصنيف" />
                <x-table.th label="Control" label_ar=" الضوابط" />
            </x-slot:head>
            <x-slot:body>
                @forelse ($controls as $control)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$controls" /></x-table.td>
                        <x-table.td>{{ $control->sub_domain_name }}</x-table.td>
                        <x-table.td>{{ $control->main_domain_name }}</x-table.td>
                        <x-table.td>{{ $control->best_practices_name }}</x-table.td>
                        <x-table.td>{{ $control->control_type_name }}</x-table.td>
                        <x-table.td>{{ $control->category_name }}</x-table.td>
                        <x-table.td>{{ $control->classification_name }}</x-table.td>
                        <x-table.td min-width="450px" max-width="700px">{{ $control->control_id }} - {{ $control->control_name }}</x-table.td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-3 py-6 text-center text-gray-500">No controls found.</td>
                    </tr>
                @endforelse
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $controls->links() }}
        </x-pagination>


    </div>
@endsection
