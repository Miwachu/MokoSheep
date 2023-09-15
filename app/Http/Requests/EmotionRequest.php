<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'emotion.A' => 'nullable|boolean',
            'emotion.percentage_of_A' => 'nullable|integer',
            'emotion.B' => 'nullable|boolean',
            'emotion.percentage_of_B' => 'nullable|integer',
            'emotion.C' => 'nullable|boolean',
            'emotion.percentage_of_C' => 'nullable|integer',
            'emotion.D' => 'nullable|boolean',
            'emotion.percentage_of_D' => 'nullable|integer',
            'emotion.E' => 'nullable|boolean',
            'emotion.percentage_of_E' => 'nullable|integer',
            'emotion.F' => 'nullable|boolean',
            'emotion.percentage_of_F' => 'nullable|integer',
            //
        ];
    }
}
