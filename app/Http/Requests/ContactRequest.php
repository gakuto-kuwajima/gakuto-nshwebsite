<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     *
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules()
    {
        return [
            //
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'body'=>'required'
        ];
    }

    public function attributes(){
      return [
        'name'=>'お名前',
        'email'=>'メールアドレス',
        'subject'=>'件名',
        'body'=>'内容'
      ];
    }

    protected $redirectAction = 'ContactsController@index';
}
