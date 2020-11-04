<?php

namespace App\Http\Requests;


class ShopCreateProductRequest extends MainRequest
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
            'category_id' => self::INTEGER,
            'description' => 'required|between:5,255|',
            'old_price' => self::NUMBER,
            'price' => self::NUMBER,
            'sales' => 'required|numeric|between:1,100',
            'img_url' => 'required|url|max:255',
            'order_count' => self::INTEGER,
            'stock_availability' => self::INTEGER,
        ];
    }
}
