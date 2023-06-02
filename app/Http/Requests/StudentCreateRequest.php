<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
        return [
            'nis' => 'unique:students|max:10',
            'name' => 'max:5|required'
        ];
    }

    public function attributes()
    {
        return [
            'nis' => 'NIS',
        ];
    }

    public function messages()
    {
        return [
            'nis.max' => 'NIS max :max charakter',
            'nis.unique' => 'NIS sdh ada',
        ];
    }
}
