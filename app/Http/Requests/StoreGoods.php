<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoods extends FormRequest
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
            'incoming_good_id' => 'required',
            'goods_code' => 'required',
            'goods_name' => 'required',
            'qty' => 'required',
            'unit_id' => 'required'
        ];
    }
}
