<?php

namespace RW940cms\Http\Requests;

use RW940cms\Http\Requests\Request;


class UsersRequest extends Request
{
     public function response(array $errors){
        return \Redirect::back()->withErrors($errors)->withInput();
    }

   
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
            'email'=>'required|unique:users|max:255',
            'password'=>'required|min:6',
            'password_confirmation' => 'required|same:password'
        ];
    }

}
