<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name'      => 'required|max:50|unique:offers,name',
            'price'     => 'required|numeric',
            'description'   => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'يجب ادخال اسم العرض',
            'name.unique'       => 'اسم العرض مستخدم من قبل مستخدم اخر',
            'price.required'    => 'يجب ادخال سعر العرض',
            'description.required'  => 'يجب ادخال وصف العرض',
        ];
    }
}
