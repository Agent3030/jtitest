<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
                'first_name' => ['required','string', 'min:3', 'max:255'],
                'last_name' => ['required','string', 'min:3', 'max:255'],
                'email' => ['email', 'min:3', 'max:255'],
                'phone' => ['numeric', 'min:3', 'max:255'],
                'company_id'=>['numeric'],
                'id' => ['nummeric'],
            ];
        } else {
            $rules=[
                'first_name' => ['required','string', 'min:3', 'max:255'],
                'last_name' => ['required','string', 'min:3', 'max:255'],
                'email' => ['email', 'min:3', 'max:255'],
                'phone' => ['string', 'min:3', 'max:255'],
                'company_id'=>['numeric'],

            ];
        }
        return $rules;
    }
}
