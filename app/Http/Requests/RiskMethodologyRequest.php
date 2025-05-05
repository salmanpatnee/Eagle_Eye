<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RiskMethodologyRequest extends FormRequest
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
        $riskMethodologyId = $this->route('risk_methodology');

        return [
            'risk_methodology_id' => [
                'required',
                Rule::unique('risk_methodology_table', 'risk_methodology_id')
                    ->ignore($riskMethodologyId, 'risk_methodology_id'),
            ],
            'risk_methodology_name' => 'nullable',
            'background' => 'nullable',
            'owner_id' => 'nullable',
            'risk_methodology_source' => 'nullable',
            'asset_identification' => 'nullable',
            'threat_identification' => 'nullable',
            'vulnerability_identification' => 'nullable',
            'risk_appetite_determination' => 'nullable',
            'risk_assessment_approach' => 'nullable',
            'risk_name' => 'nullable',
            'risk_treatment' => 'nullable',
            'residual_risk' => 'nullable',
            'risk_acceptance' => 'nullable',
            'risk_audit' => 'nullable',
            'risk_change_management' => 'nullable',
            'scope' => 'nullable',
            'scope' => 'nullable',
            'objectives' => 'nullable',
            'context' => 'nullable',
            'risk_identification' => 'nullable',
            'risk_analysis' => 'nullable',
            'risk_evaluation' => 'nullable',
            'documentation' => 'nullable',
            'alignment_iso' => 'nullable',
        ];
    }
}
