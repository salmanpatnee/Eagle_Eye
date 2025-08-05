@extends('layouts/cms')
@section('title', 'Process')
@section('title_ar', 'العملية')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $process?->id ? 'Update' : 'New' }} Process">
            <x-action.button label="View" label_ar="منظر" route_name="process.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($process) ? route('process.update', $process->id) : route('process.store') }}" method="POST">
            @csrf
            @if (isset($process))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Process ID" label_ar="رمز العملية" name="process_id" required="true"
                            :readonly="$process?->process_id" placeholder="Enter Process ID" :value="$process?->process_id" />
                    </div>
                    <div>
                        <x-form.field label="Process Name" label_ar="اسم العملية" name="title" required="true"
                            placeholder="Enter Process Name" :value="$process?->title" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Process Name Arabic" label_ar="اسم العملية عربي" name="title_ar"
                            placeholder="Enter Process Name Arabic" :value="$process?->title_ar" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Process Description" label_ar="وصف العملية" name="description"
                        placeholder="Enter Process Description" :value="$process?->description" />
                </x-form.grid-col-full>



                <div class="flex justify-end">
                    <x-form.submit label="Process" label_ar="العملية" :isUpdate="$process?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
