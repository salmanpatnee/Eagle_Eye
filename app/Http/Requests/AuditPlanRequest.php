<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuditPlanRequest extends FormRequest
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
        $auditPlan = $this->route('auditPlan');

        return [
             'audit_id' => ['required', 
                Rule::unique('audit_plan_table', 'audit_id')
                ->ignore($auditPlan, 'audit_id'),],
            'audit_name' => ['required'],
            'audit_description' => ['nullable'],
            'audit_sponsor' => ['nullable'],
            'audit_scope' => ['nullable'],
            'audit_objectives' => ['nullable'],
            'audit_criteria' => ['nullable'],
            'audit_methodology' => ['nullable'],
            'audit_plan_start_date' => ['required'],
            'audit_plan_end_date' => ['nullable'],
            'auditing_entity' => ['nullable'],
            'auditee_id' => ['required'],
            'location_id' => ['required'],
            'audit_nature' => ['nullable'],
            'audit_type' => ['nullable'],
            'auditor_id' => ['required'],
            'sampling' => ['nullable'],
            'evidence_needed' => ['nullable'],
            'schedule' => ['nullable'],
            'cost' => ['nullable'],
            'comment' => ['nullable'],
        ];
    }
}
