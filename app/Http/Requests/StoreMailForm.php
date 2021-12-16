<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'g-recaptcha-response' => 'recaptcha',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('request.name.required'),
            'phone.required' => trans('request.phone.required'),
        ];
    }
}
