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
            'item_id' => 'exists:items,id|numeric|required',
            'percent' => 'numeric|required',
            'new_price' => 'numeric|required|integer',
            'date_expired' => 'date|required'
        ];
    }
}
