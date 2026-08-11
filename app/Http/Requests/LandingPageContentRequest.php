<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandingPageContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hero_title' => ['nullable', 'string'],
            'hero_list_items' => ['nullable', 'string'],
            'hero_image_path' => ['nullable', 'file', 'image', 'max:2048'],
            'features_title' => ['nullable', 'string'],
            'features_list_items' => ['nullable', 'string'],
            'features_image_path' => ['nullable', 'file', 'image', 'max:2048'],
            'benefits_title' => ['nullable', 'string'],
            'benefits_left_title' => ['nullable', 'string'],
            'benefits_left_items' => ['nullable', 'string'],
            'benefits_right_title' => ['nullable', 'string'],
            'benefits_right_items' => ['nullable', 'string'],
            'stats_title' => ['nullable', 'string'],
            'stats_subtitle' => ['nullable', 'string'],
            'cyber_professionals_title' => ['nullable', 'string'],
            'cyber_professionals_content' => ['nullable', 'string'],
            'cyber_professionals_image_path' => ['nullable', 'file', 'image', 'max:2048'],
            'cyber_professionals_notice_title' => ['nullable', 'string'],
            'cyber_professionals_notice_content' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.max' => 'The :attribute may not be greater than :max characters.',
            'hero_image_path.image' => 'The hero image must be a valid image file.',
            'hero_image_path.max' => 'The hero image may not be greater than 2MB.',
            'features_image_path.image' => 'The features image must be a valid image file.',
            'features_image_path.max' => 'The features image may not be greater than 2MB.',
            'cyber_professionals_image_path.image' => 'The cybersecurity professionals image must be a valid image file.',
            'cyber_professionals_image_path.max' => 'The cybersecurity professionals image may not be greater than 2MB.',
        ];
    }
}
