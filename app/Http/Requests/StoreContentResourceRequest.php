<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentResourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'videoUploadEle' => 'nullable|file|max:20480',
            'checklistUploadEle' => 'nullable|file|max:20480',
            'templateUploadEle' => 'nullable|file|max:20480',
            'glossaryUploadEle' => 'nullable|file|max:20480',
            'resource_type' => 'required|in:guide,template,checklist,glossary',
            'resourceable_id' => 'required|string',
            'resourceable_type' => 'required|string',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'resource_type.required' => 'A resource type is required.',
            'resource_type.in' => 'The resource type must be one of: guide, template, checklist, or glossary.',
            'resourceable_id.required' => 'The resourceable ID is required.',
            'resourceable_type.required' => 'The resourceable type is required.',
        ];
    }
}
