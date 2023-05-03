<?php

namespace App\Http\Requests;

use App\Models\Vacation;
use Illuminate\Foundation\Http\FormRequest;

class VacationModelRequest extends FormRequest
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
        return Vacation::RULES;
    }

    public function messages()
    {
        return [
            'start_date.required' => 'Укажите дату начала.',
            'end_date.required' => 'Укажите дату окончания.',
        ];
    }
}
