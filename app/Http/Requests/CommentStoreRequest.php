<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
        if(\Auth::check()) {
            return [
                'comment' => 'required|min:10',
            ];
        }
        else {
            return [
                'email' => 'required|max:256',
                'name' => 'required|max:256',
                'comment' => 'required:min:10',
            ];
        }
    }

    public function messages()
    {
        return [
            'comment.required' => 'Message can not be null.',
        ];
    }
}
