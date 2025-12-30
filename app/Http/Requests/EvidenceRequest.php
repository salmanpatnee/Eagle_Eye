<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceRequest extends FormRequest
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
        return [
            'evidence_id' => 'required',
            'evidence_name' => 'required',
            'evidence_description' => 'nullable',
            'classification_id' => 'nullable',
            'categories' => 'nullable',
            'controls' => 'nullable',
            'attachments' => 'nullable',
            'evidence_nature' => 'required',
            'evidence_source' => 'nullable',
            'evidence_type' => 'required',
            'owner_id' => 'required',
            'evidence_critical_asset' => 'nullable',
            'evidence_cloud' => 'nullable',
            'evidence_telework' => 'nullable',
            'Evidence_social_media' => 'nullable',
            'Evidence_data_privacy' => 'nullable',
            'evidence_pii' => 'nullable',
            'evidence_pci_dss' => 'nullable',
            'Evidence_e_commerce' => 'nullable',
            'Evidence_infrastructure' => 'nullable',
            'Evidence_application' => 'nullable',
            'Evidence_hr' => 'nullable',
            'physical_security' => 'nullable',
            'third_party' => 'nullable',
            'operational_technology' => 'nullable',
            'payment' => 'nullable',
            'e_banking' => 'nullable',
        ];
    }
}
