@extends('layouts.app')
@section('title', 'Sub-Domains Setup')
@section('title_ar', 'إعداد المكون الفرعي')
@section('content')
    <div>
        <x-table.action-wrapper title="New Domain">
            <x-action.button label="View" label_ar="منظر" route_name="sub-domains.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($subDomain) ? route('sub-domains.update', $subDomain->id) : route('sub-domains.store') }}"
            method="POST">
            @csrf
            @if (isset($subDomain))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $subDomain->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Sub-Domain ID" label_ar="اسم المكون الفرعي" name="sub_domain_id"
                            required="true" :readonly="$subDomain?->sub_domain_id" placeholder="Enter Sub-Domain ID" :value="$subDomain?->sub_domain_id" />
                    </div>
                    <div>
                        <x-form.field label="Sub-Domain Name" label_ar="اسم المكون الأساسي" name="sub_domain_name"
                            required="true" placeholder="Enter Sub-Domain Name" :value="$subDomain?->sub_domain_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Sub-Domain Description" label_ar="وصف المكون الفرعي"
                        name="sub_domain_description" placeholder="Enter Sub-Domain Description" :value="$subDomain?->sub_domain_description" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Classification" label_ar="التصنيف" name="classification_id" required="true"
                            placeholder="Enter Classification" :value="$subDomain?->classification_id" :data="$classifications"
                            id_key="classification_id" />
                    </div>

                    <div>
                        <x-form.multiselect label="Best Practices" label_ar="أفضل الممارسات" name="bestPractices[]"
                            required="true" :value="$bestPracticeIds" :data="$bestPractices" id_key="best_practices_id"
                            value_key="best_practices_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Categories" label_ar="اسم الفئة" name="categories[]" required="true"
                            :value="$categoryIds" :data="$categories" id_key="category_id" value_key="category_name" />
                    </div>

                    <div>
                        <x-form.select label="Domains" label_ar="المكون الأساسي" name="main_domain_id" required="true"
                            placeholder="Select Domain" :value="$subDomain?->main_domain_id" :data="$domains" id_key="main_domain_id"
                            value_key="main_domain_name" />
                    </div>


                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Sub-Domain" label_ar="المكون الفرعي" :isUpdate="$subDomain?->sub_domain_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
