<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GigFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'venue'=> 'required|max:700',
            'date'=> 'required',
            'genre_id'=> 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'genre_id.required' => 'Please choose genre from list.',
        ];
    }
}
