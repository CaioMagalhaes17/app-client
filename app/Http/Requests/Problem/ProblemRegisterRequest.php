<?php

namespace App\Http\Requests\Problem;

use Illuminate\Foundation\Http\FormRequest;

class ProblemRegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'brand' => 'required',
            'description' => 'required',
            'model' => 'required',
            'usage_time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Preencha este campo para o registro',
        ];
    }
}
