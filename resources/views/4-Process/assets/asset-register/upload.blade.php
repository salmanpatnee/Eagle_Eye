@extends('4-Process.assets.layout.app')
@section('title', 'Asset Registration')
@section('title_ar', 'تسجيل الأصول')
@section('content')
    <div>
        <x-table.action-wrapper title="Upload Asset Data">
            <x-action.link download label="Download Template File" label_ar="تحميل ملف القالب" :link="asset('templates/asset_register_template.xlsx')" />
            <x-action.button label="All Assets" label_ar="جميع الأصول" route_name="assets.index" />
        </x-table.action-wrapper>

        <form action="{{ route('upload.assets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">

                <x-form.grid-col-full>
                    <x-form.upload-field label="Upload Excel File" label_ar="تحميل ملف اكسل" name="excel_file"
                        placeholder="Upload Excel File" required />
                </x-form.grid-col-full>


                <div class="flex justify-end">
                    <x-form.submit label="" label_ar="" />
                </div>
            </div>
        </form>

    </div>
@endsection
