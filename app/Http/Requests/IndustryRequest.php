<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $industryId = $this->route('industry'); // Get the industry ID from the route for update requests

        return [
            'industry_name' => [
                'required',
                'string',
                'max:255',
                $industryId ? 'unique:hr_industry_table,industry_name,' . $industryId . ',id' : 'unique:hr_industry_table,industry_name'
            ],
            'sector' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'industry_name.required' => 'The industry name is required.',
            'industry_name.unique' => 'An industry with this name already exists.',
            'industry_name.max' => 'The industry name may not be greater than 255 characters.',
            'sector.max' => 'The sector may not be greater than 255 characters.',
        ];
    }
}
