<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VaccineRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'vaccine_center_id' => 'required|integer|exists:vaccine_centers,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|size:14|regex:/^\+8801[3-9]\d{8}$/|unique:vaccine_registrations,phone',
            'email' => 'required|email|max:255|unique:vaccine_registrations,email',
            'nid' => 'required|string|size:17|unique:vaccine_registrations,nid',
            'address' => 'nullable|string',
            'birth_date' => 'required|date:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'nid.unique' => 'You are already registered for vaccine',
        ];
    }
}
