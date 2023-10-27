<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'code'              =>  'required',
            'user_id'           =>  ['required', 'exists:users,id'],
            'items'             =>  ['array', 'required'],
            'items.*.id'        =>  ['required', 'exists:items,id'],
            'items.*.price'     =>  ['required'],
            'items.*.amount'    =>  ['required'],
        ];
    }
}
