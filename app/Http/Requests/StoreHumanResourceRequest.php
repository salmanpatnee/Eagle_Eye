<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHumanResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'expert_id' => 'nullable|string|max:255|unique:hr_expert_master_table,expert_id',
            'name' => 'required|string|max:255',
            'linkedin_profile' => 'nullable|url|max:255',
            'experience' => 'nullable|string|max:255',
            'organization_id' => 'required|exists:hr_organization_table,organization_id',
            'industry_id' => 'required|exists:hr_industry_table,industry_id',
            'nationality_id' => 'required|exists:nationalities,id',
            'designation' => 'required|string|max:255',
            'certifications' => 'nullable|array',
            'certifications.*' => 'exists:hr_certification_table,certification_id',
            'experties' => 'nullable|array',
            'experties.*' => 'exists:hr_expertise_table,expertise_id',
        ];
    }

    public function messages(): array
    {
        return [
            'expert_id.unique' => 'This Expert ID is already taken.',
            'name.required' => 'The expert name is required.',
            'organization_id.required' => 'Please select an organization.',
            'organization_id.exists' => 'The selected organization does not exist.',
            'industry_id.required' => 'Please select an industry.',
            'industry_id.exists' => 'The selected industry does not exist.',
            'nationality_id.required' => 'Please select a nationality.',
            'nationality_id.exists' => 'The selected nationality does not exist.',
            'designation.required' => 'The designation is required.',
            'linkedin_profile.url' => 'Please provide a valid LinkedIn profile URL.',
            'certifications.*.exists' => 'One or more selected certifications do not exist.',
            'experties.*.exists' => 'One or more selected expertise do not exist.',
        ];
    }
}
