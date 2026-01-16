@extends('process/initial-setup/layout/app')
@section('title', 'Best Practices Definition')
@section('title_ar', 'تعريف أفضل الممارسات')
@section('content')
    @php
        $yesNoOptions = ['Yes', 'No'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ $bestPractice?->id ? 'Update' : 'New' }} Best Practice">
            <x-action.button label="View" label_ar="منظر" route_name="best-practices.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($bestPractice) ? route('best-practices.update', $bestPractice->best_practice_id) : route('best-practices.store') }}"
            method="POST">
            @csrf
            @if (isset($bestPractice))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Best Practice ID" label_ar="رمز أفضل الممارسات" name="best_practice_id"
                            required="true" :readonly="$bestPractice?->best_practice_id" placeholder="Enter Best Practice ID" :value="$bestPractice?->best_practice_id" />
                    </div>
                    <div>
                        <x-form.field label="Best Practice Name" label_ar="اسم أفضل الممارسات" name="best_practice_name"
                            required="true" placeholder="Enter Best Practice Name" :value="$bestPractice?->best_practice_name" />
                    </div>
                </x-form.grid-col>


                <x-form.grid-col-full>
                    <x-form.textarea-field label="Best Practice Source" label_ar="مصدر أفضل الممارسات"
                        name="best_practices_source" placeholder="Enter Best Practice Source" :value="$bestPractice?->best_practices_source"
                        required="true" />
                </x-form.grid-col-full>




                <x-form.grid-col>
                    <div>
                        <x-form.field label="Best Practice Version" label_ar="إصدار نسخة من أفضل الممارسات"
                            name="best_practices_version" placeholder="Enter Best Practices Version" :value="$bestPractice?->best_practices_version" />
                    </div>
                    <div>
                        <x-form.field label="Best Practice Country" label_ar="بلد أفضل الممارسات"
                            name="best_practices_country" placeholder="Enter Best Practices Country" :value="$bestPractice?->best_practices_country" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Best Practice Regulation" label_ar="تنظيم أفضل الممارسات"
                            name="best_practices_regulation" placeholder="Select Option" :value="$bestPractice?->best_practices_regulation"
                            :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Exclusively Related to ISO?" label_ar="تتعلق حصرا؟ ISO"
                            name="best_practice_iso" placeholder="Select Option" :value="$bestPractice?->best_practice_iso" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Best Practice Year" label_ar="سنة أفضل الممارسات"
                            name="best_practices_release_year" placeholder="Enter Best Practices Year" :value="$bestPractice?->best_practices_release_year" />
                    </div>
                    <div>
                        <x-form.select label="Regulatory" label_ar="تنظيمية" name="regulatory" placeholder="Select Option"
                            :value="$bestPractice?->regulatory" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Remarks" label_ar="ملاحظات" name="remarks" placeholder="Write Remarks"
                        :value="$bestPractice?->remarks" />
                </x-form.grid-col-full>

                <div class="flex justify-end">
                    <x-form.submit label="Best Practice" label_ar="أفضل الممارسات" :isUpdate="$bestPractice?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
