<?php

namespace App\Http\Requests;

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
        if ($this->method() == 'post')
        {
            return [
                'title'=> 'required | max:255',
                'description'=> 'required | max:255',
                'body'=> 'required ',
                'images'=> 'required|mimes:jpeg,jpg,png',
                'tags'=> 'required ',
            ];
        }else
        {
            return [
                'title'=> 'required | max:255',
                'description'=> 'required | max:255',
                'body'=> 'required ',
                'tags'=> 'required ',
            ];
        }

    }
}
