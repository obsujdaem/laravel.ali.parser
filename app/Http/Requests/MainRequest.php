<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

abstract class MainRequest extends FormRequest
{
    private $validationMessages;
    protected const NUMBER = 'required|numeric|between:1,10000';
    protected const INTEGER = self::NUMBER . '|integer';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    protected function validationMassages()
    {
        if (App::getLocale() === 'en') {
            $this->validationMessages = [
                'category_id.required' => 'The field category is required.',
                'description_en.required' => 'The field :attribute is required.',
                'description_en.between' => 'The field :attribute with value :input is not between :min - :max.',
                'description_ru.required' => 'The field :attribute is required.',
                'description_ru.between' => 'The field :attribute with value :input is not between :min - :max.',
                'old_price.required' => 'The field old price is required.',
                'old_price.numeric' => 'The field :attribute need to be numeric.',
                'old_price.between' => 'The field :attribute with value :input is not between :min - :max.',
                'sales.required' => 'The field :attribute is required.',
                'sales.numeric' => 'The field :attribute need to be numeric.',
                'sales.between' => 'The field :attribute with value :input is not between :min - :max.',
                'img_url.required' => 'The field img url is required.',
                'img_url.url' => 'The field img url need to be as url link like https://...',
                'img_url.max' => 'The field img url need more than :max symbols.',
                'order_count.required' => 'The field :attribute is required.',
                'order_count.numeric' => 'The field :attribute need to be numeric.',
                'order_count.integer' => 'The field :attribute need to be integer.',
                'order_count.between' => 'The field :attribute with value :input is not between :min - :max.',
                'stock_availability.required' => 'The field stock availability is required.',
                'stock_availability.numeric' => 'The field :attribute need to be numeric.',
                'stock_availability.integer' => 'The field :attribute need to be integer.',
                'stock_availability.between' => 'The field :attribute with value :input is not between :min - :max.',
            ];
        } elseif (App::getLocale() === 'ru') {
            $this->validationMessages = [
                'category_id.required' => 'Укажите категорию',
                'description_en.required' => 'Заполните описание на английском',
                'description_en.between' => 'Описание со значением :input не входит в допустимую выборку :min - :max.',
                'description_ru.required' => 'Заполните описание на русском',
                'description_ru.between' => 'Описание со значением :input не входит в допустимую выборку :min - :max.',
                'old_price.required' => 'Укажите старую цену',
                'old_price.numeric' => 'Значение поля должно быть числовым.',
                'old_price.between' => 'Старая цена со значением :input не входит в допустимую выборку :min - :max.',
                'sales.required' => 'Укажите скидку в %',
                'sales.numeric' => 'Значение поля должно быть числовым.',
                'sales.between' => 'Поле "скидка" со значением :input не входит в допустимую выборку :min - :max.',
                'img_url.required' => 'Укажите путь к картинке',
                'img_url.url' => 'Значение этого поля должно быть ссылка, по примеру: https://...',
                'img_url.max' => 'Длина поля "ссылка на картинку" должно быть не более чем :max символов',
                'order_count.required' => 'Укажите количество проданных товаров',
                'order_count.numeric' => 'Значение поля должно быть числовым.',
                'order_count.integer' => 'Значения этого поля должно быть целым числом',
                'order_count.between' => 'Поле "количество заказов" со значением :input не входит в допустимую выборку :min - :max.',
                'stock_availability.required' => 'Укажите сколько товара на складе',
                'stock_availability.numeric' => 'Значение поля должно быть числовым.',
                'stock_availability.integer' => 'Значения этого поля должно быть целым числом',
                'stock_availability.between' => 'Поле "на складе" со значением :input не входит в допустимую выборку :min - :max.',
            ];
        }

        return $this->validationMessages;
    }

}
