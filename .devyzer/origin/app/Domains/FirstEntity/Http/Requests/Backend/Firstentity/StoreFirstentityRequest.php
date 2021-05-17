<?php

namespace App\Domains\FirstEntity\Http\Requests\Backend\Firstentity;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreFirstentityRequest.
 */
class StoreFirstentityRequest extends FormRequest
{
    /**
     * Determine if the firstentity is authorized to make this request.
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
            'name'=>'nullable',
            'mobile'=>'nullable',
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