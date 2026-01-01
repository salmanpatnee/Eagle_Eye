<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Experties; // Using the existing expertise model

class ExpertiseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Allow access for authenticated users with proper roles
        // This will be handled by the controller's middleware
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $expertiseId = $this->route('expertise'); // Get the expertise ID from the route for update operations

        $rules = [
            'expertise_title' => 'required|string|max:255'
        ];

        // For update operations, exclude the current record from uniqueness check
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['expertise_title'][] = 'unique:hr_expertise_table,expertise_title,' . $expertiseId . ',expertise_id';
        } else {
            // For create operations, just ensure uniqueness
            $rules['expertise_title'][] = 'unique:hr_expertise_table,expertise_title';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'expertise_title.required' => 'The expertise title is required.',
            'expertise_title.string' => 'The expertise title must be a string.',
            'expertise_title.max' => 'The expertise title may not be greater than 255 characters.',
            'expertise_title.unique' => 'The expertise title has already been taken.',
        ];
    }
}
