<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactMessageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:50',
            'message' => 'required|string|max:255',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        throw new HttpResponseException(
            redirect()->route('index')->with('error', $validator->errors()->first()));
    }
}
