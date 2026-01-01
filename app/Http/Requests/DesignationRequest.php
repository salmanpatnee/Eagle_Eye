<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Designation;

class DesignationRequest extends FormRequest
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
        $designationId = $this->route('designation'); // Get the designation ID from the route for update operations

        $rules = [
            'designation_id' => 'required|string|max:255',
            'designation_name' => 'required|string|max:255'
        ];

        // For update operations, exclude the current record from uniqueness check
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['designation_id'][] = 'unique:hr_designation_table,designation_id,' . $designationId . ',id';
        } else {
            // For create operations, just ensure uniqueness
            $rules['designation_id'][] = 'unique:hr_designation_table,designation_id';
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
            'designation_id.required' => 'The designation ID is required.',
            'designation_id.string' => 'The designation ID must be a string.',
            'designation_id.max' => 'The designation ID may not be greater than 255 characters.',
            'designation_id.unique' => 'The designation ID has already been taken.',
            'designation_name.required' => 'The designation name is required.',
            'designation_name.string' => 'The designation name must be a string.',
            'designation_name.max' => 'The designation name may not be greater than 255 characters.',
        ];
    }
}
