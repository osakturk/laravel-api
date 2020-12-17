<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderFormStoreRequest extends FormRequest
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
        $ignoreID = $this->route('orders')->id;

        return [
            'quantity' => 'required|numeric',
            'order_code' => ['required', Rule::unique('orders')->ignore($ignoreID)],
            'product_id' => 'required|numeric',
            'address' => 'required'
        ];
    }
}
