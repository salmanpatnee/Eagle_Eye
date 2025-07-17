@extends('layouts.app')
@section('title', 'Custodian Registration')
@section('title_ar', 'تسجيل الوصي')
@section('content')
    <div>
        <x-table.action-wrapper title="Upload Custodians">
            <x-action.link download label="Download Template File" label_ar="تحميل ملف القالب" :link="asset('templates/custodian_name_template.xls')" />
            <x-action.button label="All Custodians" label_ar="جميع الوصي" route_name="custodians.index" />
        </x-table.action-wrapper>

        <form action="{{ route('upload.custodians.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">

                <x-form.grid-col-full>
                    <x-form.upload-field label="Upload Excel File" label_ar="تحميل ملف اكسل" name="excel_file"
                        placeholder="Upload Excel File" />
                </x-form.grid-col-full>


                <div class="flex justify-end">
                    <x-form.submit label="" label_ar="" />
                </div>
            </div>
        </form>

    </div>
@endsection
