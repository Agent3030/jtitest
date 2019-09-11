<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Company extends FormRequest
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
        $rules=[];
        $id = $this->request->get('id');

        if ($id !== null) {
           $rules=[
               'name' => ['required','string', 'min:3', 'max:255'],
               'email' => ['email', 'min:3', 'max:255'],
               'website' => ['url', 'min:3', 'max:255'],
               'logo'=>['image', 'dimensions:min_width=100,min_height=200'],
               'id' => ['number'],
           ];
        } else {
            $rules=[
                'name' => ['required','string', 'min:3', 'max:255'],
                'email' => ['email', 'min:3', 'max:255'],
                'website' => ['string', 'min:3', 'max:255'],
                'logo'=>['image', 'dimensions:min_width=100,min_height=200'],

            ];
        }
        return $rules;
    }
}
