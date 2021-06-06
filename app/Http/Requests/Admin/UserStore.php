<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStore extends FormRequest
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
                'name'=>['required','string','min:1','max:20'],
                'email'=>['required','string','email','max:255',Rule::unique('users')->ignore(auth()->user()->id)],
                'mobile'=>['required','string','min:10','max:12',Rule::unique('users')->ignore(auth()->user()->id)],
                'type'=>['required'],
                'profile'=>['required']

        ];
    }
}
