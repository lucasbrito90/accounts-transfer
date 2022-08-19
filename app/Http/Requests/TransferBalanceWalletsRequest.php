<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferBalanceWalletsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'source' => 'required|exists:customers,account_number',
            'amount' => 'required|numeric|min:0',
            'target' => 'required|exists:customers,account_number',

        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'Please enter an amount',
            'amount.numeric' => 'Please enter a valid amount',
            'amount.min' => 'Please enter a valid amount',
            'source.required' => 'Please enter a source account number',
            'source.exists' => 'Please enter a valid source account number',
            'target.required' => 'Please enter a target account number',
            'target.exists' => 'Please enter a valid target account number',
        ];
    }
}
