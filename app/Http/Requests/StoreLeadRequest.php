<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:leads,email',
            'phone' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'message' => 'required|string',
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
            'fullname.required' => 'Your full name is required.',
            'email.required' => 'Your email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'An inquiry with this email address already exists.',
            'phone.required' => 'Your phone number is required.',
            'company.required' => 'Your company name is required.',
            'message.required' => 'Your message is required.',
        ];
    }
}