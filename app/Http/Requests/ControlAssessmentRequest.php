<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ControlAssessmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $controlAssessmentId = $this->route('controlAssessment');

        return [
            'control_assessment_id' => ['required', 
                Rule::unique('control_assessment_master_table', 'control_assessment_id')
                ->ignore($controlAssessmentId, 'control_assessment_id'),],
            'control_assessment_name' => 'required',
            'control_assessment_description' => 'nullable',
            'control_assessment_start_date' => 'required',
            'control_assessment_end_date' => 'required',
            'control_assessment_type' => 'nullable',
            'control_assessment_internal_external' => 'nullable',
            'control_assessment_approach' => 'nullable',
            'control_assessment_objectives' => 'nullable',
            'standard_references' => 'nullable',
            'best_practices_id' => 'required',
            'location_id' => 'required',
            'auditor_id' => 'required',
            'classification_id' => 'required',
        ];
    }
}
