<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ControlAssessmentFindingRequest extends FormRequest
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
        $rules = [
            'control_finding_name' => 'required',
            'control_id' => 'required',
            'categories' => 'nullable',
            'control_finding_description' => 'nullable',
            'control_implementation_status' => 'required',
            'control_maturity_level' => 'required',
            'control_implementation_details' => 'nullable',
            'control_maturity_justification' => 'nullable',
            'remarks' => 'nullable',
            'corrective_action' => 'nullable',
            'corrective_action_due_date' => array_filter(['nullable', 'date', $this->isMethod('POST') ? 'after_or_equal:today' : null]),
            'preventive_action' => 'nullable',
            'preventive_action_due_date' => array_filter(['nullable', 'date', $this->isMethod('POST') ? 'after_or_equal:today' : null]),
            'control_auditee_name' => 'nullable',
            'control_auditee_department' => 'nullable',
            'control_auditee_system' => 'nullable',
            'lesson_learned' => 'nullable',
        ];

        if ($this->isMethod('POST')) {
            $rules['control_finding_id'] = [
                'required',
                Rule::unique('control_assessment_details_table', 'control_finding_id'),
            ];
        }

        return $rules;
    }
}
