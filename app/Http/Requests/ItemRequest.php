<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'Item_name' => 'required|string',
            'category' => 'required|exists:categorys,id',
            'Item_price' => 'integer|max:1000|min:10',
            'Item_sdescrioption' => 'string',
            'item_descrption' => 'string',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'This field is required',
            '*.string' => 'This field is string',
            'category.exists' => 'This field is not existed',

        ];
    }
}
