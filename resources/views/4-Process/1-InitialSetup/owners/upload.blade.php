@extends('layouts.app')
@section('title', 'Owner Registration')
@section('title_ar', 'تسجيل صاحب')
@section('content')
    <div>
        <x-table.action-wrapper title="Upload Owner Data">
            <x-action.link download label="Download Template File" label_ar="تحميل ملف القالب" :link="asset('templates/owner_template.xls')" />
            <x-action.button label="All Owners" label_ar="جميع المالكين" route_name="owners.index" />
        </x-table.action-wrapper>

        <form action="{{ route('upload.owners.store') }}" method="POST" enctype="multipart/form-data">
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
