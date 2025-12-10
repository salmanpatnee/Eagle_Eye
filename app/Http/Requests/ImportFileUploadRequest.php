<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportFileUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'mapping_id' => 'required|exists:import_mappings,id',
            'file' => [
                'required',
                'file',
                'mimes:csv,xlsx,xls',
                'max:' . (int)(env('IMPORT_MAX_FILE_SIZE', 102400)),
            ],
        ];
    }

    public function messages()
    {
        return [
            'mapping_id.required' => 'Please select an import mapping.',
            'mapping_id.exists' => 'The selected import mapping is invalid.',
            'file.required' => 'Please select a file to upload.',
            'file.file' => 'The uploaded file is invalid.',
            'file.mimes' => 'The file must be a CSV or Excel file (csv, xlsx, xls).',
            'file.max' => 'The file size must not exceed ' . (env('IMPORT_MAX_FILE_SIZE', 102400) / 1024) . 'MB.',
        ];
    }
}
