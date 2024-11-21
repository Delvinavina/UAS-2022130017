<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveHotelRequest extends FormRequest
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
            'hotel_name' => 'required|max:155',
            'hotel_address' => 'required|max:155',
            'hotel_contact' => 'required|string|max:25|regex:/^[0-9]+$/',
            'hotel_desc' => 'nullable',
        ];
    }
}