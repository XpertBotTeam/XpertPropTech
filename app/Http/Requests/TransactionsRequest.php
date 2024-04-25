<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id'=>'required',
            'properties_id'=>'required',
            'client_id'=>'required',
            'agent_id'=>'required',
            'transaction_date'=>'required',
            'transaction_type'=>'required',
            'amount'=>'required',

        

         

       
        ];
    }
}
