<?php

namespace App\Http\Requests;

use app\Models\Sport;
use Illuminate\Foundation\Http\FormRequest;

class SportUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'equipments_id' => [
                'required'
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O nome é necessario.'
        ];
    }
}
