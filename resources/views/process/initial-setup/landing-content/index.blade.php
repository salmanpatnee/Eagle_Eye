@extends('process/initial-setup/layout/app')
@section('title', 'Landing Page Content')
@section('title_ar', 'محتوى الصفحة الرئيسية')

@section('content')
    <div>
        <x-table.action-wrapper title="Landing Page Content" />

        <form action="{{ route('landing-content.update') }}" method="POST">
            @csrf
            @method('PUT')

            @foreach ($landingSections as $landingSection)
                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                    <h2 class="dark:text-white font-medium text-base">{{ ucfirst($landingSection->section_key) }}
                        Section</h2>
                    @if ($landingSection->section_key !== 'hero')
                        <x-form.grid-col-full>
                            <x-form.field label="Eyebrow" label_ar="العنوان الفرعي"
                                name="sections[{{ $landingSection->id }}][eyebrow]" placeholder="Enter Eyebrow"
                                :value="$landingSection->eyebrow" />
                        </x-form.grid-col-full>
                    @endif
                    <x-form.grid-col-full>
                        <x-form.field label="Title" label_ar="العنوان"
                            name="sections[{{ $landingSection->id }}][title]" placeholder="Enter Title"
                            :value="$landingSection->title" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Body" label_ar="النص"
                            name="sections[{{ $landingSection->id }}][body]" placeholder="Enter Body"
                            :value="$landingSection->body" />
                    </x-form.grid-col-full>

                    @if ($landingSection->section_key === 'how')
                        @for ($i = 0; $i < 3; $i++)
                            <x-form.grid-col-full>
                                <x-form.field label="Step {{ $i + 1 }} Title" label_ar="عنوان الخطوة"
                                    name="sections[{{ $landingSection->id }}][meta][items][{{ $i }}][title]"
                                    placeholder="Enter Step Title"
                                    :value="$landingSection->meta['items'][$i]['title'] ?? ''" />
                            </x-form.grid-col-full>
                            <x-form.grid-col-full>
                                <x-form.textarea-field label="Step {{ $i + 1 }} Body" label_ar="نص الخطوة"
                                    name="sections[{{ $landingSection->id }}][meta][items][{{ $i }}][body]"
                                    placeholder="Enter Step Body"
                                    :value="$landingSection->meta['items'][$i]['body'] ?? ''" />
                            </x-form.grid-col-full>
                        @endfor
                    @elseif ($landingSection->section_key === 'stats')
                        @for ($i = 0; $i < 4; $i++)
                            <x-form.grid-col-full>
                                <x-form.field label="Stat {{ $i + 1 }} Value" label_ar="قيمة الإحصائية"
                                    name="sections[{{ $landingSection->id }}][meta][items][{{ $i }}][value]"
                                    placeholder="Enter Stat Value"
                                    :value="$landingSection->meta['items'][$i]['value'] ?? ''" />
                            </x-form.grid-col-full>
                            <x-form.grid-col-full>
                                <x-form.field label="Stat {{ $i + 1 }} Label" label_ar="تسمية الإحصائية"
                                    name="sections[{{ $landingSection->id }}][meta][items][{{ $i }}][label]"
                                    placeholder="Enter Stat Label"
                                    :value="$landingSection->meta['items'][$i]['label'] ?? ''" />
                            </x-form.grid-col-full>
                        @endfor
                    @endif
                </div>
            @endforeach

            <div class="flex justify-end p-5 sm:p-6">
                <x-form.submit label="Landing Page Content" label_ar="محتوى الصفحة الرئيسية" :isUpdate="true" />
            </div>
        </form>
    </div>
@endsection
