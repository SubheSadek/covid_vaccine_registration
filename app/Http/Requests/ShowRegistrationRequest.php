<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowRegistrationRequest extends FormRequest
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
            'nid' => 'required|string|size:17|exists:vaccine_registrations,nid',
        ];
    }

    public function messages(): array
    {
        return [
            'nid.exists' => 'No registration is found with this nid',
        ];
    }
}
