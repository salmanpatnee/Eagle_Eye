@extends('layouts.app')
@section('title', 'Main Domains')
@section('title_ar', 'المكون الأساسي')
@section('content')
    <div>
        <x-table.action-wrapper title="New Domain">
            <x-action.button label="View" label_ar="منظر" route_name="domains.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($domain) ? route('domains.update', $domain->id) : route('domains.store') }}" method="POST">
            @csrf
            @if (isset($domain))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $domain->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Domain ID" label_ar="رمز المكون الأساسي" name="main_domain_id" required="true"
                            :readonly="$domain?->main_domain_id" placeholder="Enter Domain ID" :value="$domain?->main_domain_id" />
                    </div>
                    <div>
                        <x-form.field label="Domain Name" label_ar="اسم المكون الأساسي" name="main_domain_name"
                            required="true" placeholder="Enter Domain Name" :value="$domain?->main_domain_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Domain Description" label_ar="وصف المكون الأساسي"
                        name="main_domain_description" placeholder="Enter Domain Description" :value="$domain?->main_domain_description" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Classification" label_ar="التصنيف" name="classification_id" required="true"
                            placeholder="Enter Classification" :value="$domain?->classification_id" :data="$classifications"
                            id_key="classification_id" value_key="location_name" />
                    </div>

                    <div>
                        Best Practice
                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Department" label_ar="القسم" :isUpdate="$domain?->main_domain_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
