<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
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
            'log.date' => 'nullable|date',
            'log.weather' => 'required|string|max:10',
            'log.situation' => 'required|string|max:1000',
            'log.image_url' => 'nullable|file',
            'log.emotion' => 'required|string|max:300',
            'log.evidence_of_emotion' => 'required|string|max:1000',
            'log.counter_evidence_of_emotion' => 'required|string|max:1000',
            'log.flexible_thought' => 'required|string|max:1000',

    
        ];
    }
}
