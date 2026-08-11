@extends('layouts/user')
@section('title', 'Landing Page Content Management')
@section('content')
    <div>
        <form action="{{ route('landing-page-content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <!-- Hero Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900">Hero Section</h3>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Title" name="hero_title" html="true" required="true"
                            placeholder="Enter Title (HTML supported)" :value="$landingPageContent?->hero_title" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                            <!-- Upload Field -->
                            <div>
                                <x-form.upload-field label="Image" name="hero_image_path"
                                    :value="$landingPageContent?->hero_image_path" />
                            </div>

                            <!-- Image Preview -->
                            @if($landingPageContent?->hero_image_path)
                                <div class="relative group">
                                    <div class="relative rounded-xl overflow-hidden border border-slate-300 shadow-lg hover:shadow-xl transition-all duration-300 ease-out">
                                        <div class="aspect-video flex items-center justify-center overflow-hidden py-4">
                                            {{-- <img src="/storage/{{ $landingPageContent->hero_image_path }}" alt="Hero Image Preview" class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105"> --}}
                                            <img src="{{ asset('storage/' . $landingPageContent->hero_image_path) }}" alt="Hero Image Preview" class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Content" name="hero_list_items" html="true" required="true"
                            placeholder="Enter Content (HTML supported)" :value="$landingPageContent?->hero_list_items" />
                    </x-form.grid-col-full>
                </div>

                <!-- Features Section -->
                <div class="space-y-4 border-t border-gray-100 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900">Features Section</h3>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Title" name="features_title" html="true" required="true"
                            placeholder="Enter Title (HTML supported)" :value="$landingPageContent?->features_title" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                            <!-- Upload Field -->
                            <div>
                                <x-form.upload-field label="Image" name="features_image_path"
                                    :value="$landingPageContent?->features_image_path" />
                            </div>

                            <!-- Image Preview -->
                            @if($landingPageContent?->features_image_path)
                                <div class="relative group">
                                    <div class="relative rounded-xl overflow-hidden border border-slate-300 shadow-lg hover:shadow-xl transition-all duration-300 ease-out">
                                        <div class="aspect-video flex items-center justify-center overflow-hidden">
                                            <img src="{{ asset('storage/' . $landingPageContent->features_image_path) }}" alt="Features Image Preview" class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105">

                                            
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Content" name="features_list_items" html="true" required="true"
                            placeholder="Enter Content (HTML supported)" :value="$landingPageContent?->features_list_items" />
                    </x-form.grid-col-full>
                </div>

                <!-- Benefits Section -->
                <div class="space-y-4 border-t border-gray-100 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900">Benefits Section</h3>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Title" name="benefits_title" html="true" required="true"
                            placeholder="Enter Title (HTML supported)" :value="$landingPageContent?->benefits_title" />
                    </x-form.grid-col-full>
                    <x-form.grid-col>
                        <x-form.field label="Left Title" name="benefits_left_title" placeholder="Enter Left Column Title"
                            :value="$landingPageContent?->benefits_left_title" />
                    </x-form.grid-col>
                    <x-form.grid-col>
                        <x-form.field label="Right Title" name="benefits_right_title" placeholder="Enter Right Column Title"
                            :value="$landingPageContent?->benefits_right_title" />
                    </x-form.grid-col>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Left Content" name="benefits_left_items" html="true" required="true"
                            placeholder="Enter content (HTML supported)" :value="$landingPageContent?->benefits_left_items" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Right Content" name="benefits_right_items" html="true"
                            placeholder="Enter content (HTML supported)" :value="$landingPageContent?->benefits_right_items" />
                    </x-form.grid-col-full>
                </div>

                <!-- Cybersecurity Professionals Section -->
                <div class="space-y-4 border-t border-gray-100 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900">Cybersecurity Professionals Section</h3>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Title" name="cyber_professionals_title" html="true" required="true"
                            placeholder="Enter Title (HTML supported)" :value="$landingPageContent?->cyber_professionals_title" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                            <!-- Upload Field -->
                            <div>
                                <x-form.upload-field label="Image" name="cyber_professionals_image_path"
                                    :value="$landingPageContent?->cyber_professionals_image_path" />
                            </div>

                            <!-- Image Preview -->
                            @if($landingPageContent?->cyber_professionals_image_path)
                                <div class="relative group">
                                    <div class="relative rounded-xl overflow-hidden border border-slate-300 shadow-lg hover:shadow-xl transition-all duration-300 ease-out">
                                        <div class="aspect-video flex items-center justify-center overflow-hidden">
                                            <img src="{{ asset('storage/' . $landingPageContent->cyber_professionals_image_path) }}" alt="Cybersecurity Professionals Image Preview" class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Content" name="cyber_professionals_content" html="true" required="true"
                            placeholder="Enter Content (HTML supported)" :value="$landingPageContent?->cyber_professionals_content" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.field label="Notice Title" name="cyber_professionals_notice_title" placeholder="Enter Notice Title (e.g. GDPR Compliant)"
                            :value="$landingPageContent?->cyber_professionals_notice_title" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Notice Content" name="cyber_professionals_notice_content" html="true" required="true"
                            placeholder="Enter Notice Content (HTML supported)" :value="$landingPageContent?->cyber_professionals_notice_content" />
                    </x-form.grid-col-full>
                </div>

                <!-- Stats Section -->
                <div class="space-y-4 border-t border-gray-100 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900">Stats Section</h3>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Title" name="stats_title" html="true" required="true"
                            placeholder="Enter Stats Title (HTML supported)" :value="$landingPageContent?->stats_title" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.textarea-field label="Subtitle" name="stats_subtitle" html="true" required="true"
                            placeholder="Enter Stats Subtitle (HTML supported)" :value="$landingPageContent?->stats_subtitle" />
                    </x-form.grid-col-full>
                </div>

                <div class="flex justify-end border-t border-gray-100 pt-6">
                    <x-form.submit label="Content" :isUpdate="$landingPageContent?->id" />
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.tiny.cloud/1/rcud8x8thhmzqyj8wed6iv0agctl2rkzdnl47h39l0t6lc7e/tinymce/6/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea[name="hero_title"], textarea[name="features_title"], textarea[name="benefits_title"], textarea[name="hero_list_items"], textarea[name="features_list_items"], textarea[name="benefits_left_items"], textarea[name="benefits_right_items"], textarea[name="cyber_professionals_title"], textarea[name="cyber_professionals_content"], textarea[name="cyber_professionals_notice_content"], textarea[name="stats_title"], textarea[name="stats_subtitle"]',
            plugins: 'lists code',
            toolbar: 'bold italic bullist numlist code',
            menubar: false,
            height: 300,
            branding: false,
            promotion: false,
            hidden: false
        });

        document.querySelector('form').addEventListener('submit', function() {
            tinymce.triggerSave();
        });
    </script>
@endsection
