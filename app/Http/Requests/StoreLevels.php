<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLevels extends FormRequest
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
            'Name' => 'required',
            'Images' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'Name.required' => trans('هذا الحقل مطلوب'),
            'Images.required' => trans('هذه الصورة مطلوب'),
        ];
    }
}
