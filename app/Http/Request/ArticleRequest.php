<?php

namespace App\Http\Request;

use Dotenv\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:80',
            'author' => 'required|string|min:3|max:40',
            'categories' => 'required',
//            'short_text' => 'required|string|min:10|max:100'
        ];
    }

    public function messages() {
            return [
                'title.min' => 'Поле НАЗВАНИЕ СТАТЬИ должно состоять не меньше чем из 5 символов.',
                'author.min' => 'Поле АВТОР должно состоять не меньше чем из 3 символов.',
//                'short_text.min' => 'Поле КОРОТКИЙ ТЕКСТ должен состоять не меньше чем из 10 символов.',

                'title.max' => 'Превышено колличество символов в поле НАЗВАНИЕ СТАТЬИ.Допустимое колличество 80.',
                'author.max' => 'Превышено колличество символов в поле АВТОР.Допустимое колличество 40.',
//                'short_text.max' => 'Превышено колличество символов в поле КОРОТКИЙ ТЕКСТ.Допустимое колличество 100.'
        ];
}

}

