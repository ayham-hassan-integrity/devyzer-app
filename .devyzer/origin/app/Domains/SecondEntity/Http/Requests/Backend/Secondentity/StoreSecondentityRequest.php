<?php

namespace App\Domains\SecondEntity\Http\Requests\Backend\Secondentity;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreSecondentityRequest.
 */
class StoreSecondentityRequest extends FormRequest
{
    /**
     * Determine if the secondentity is authorized to make this request.
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
            'test'=>'nullable',
            'test2'=>'nullable',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}