<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        $customerId = $this->route('customer')?$this->route('customer')->id:null;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('customers')->ignore($customerId),
            ],
            'phone' => ['nullable', 'string', 'max:20'],
            'company' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['active', 'inactive', 'lead'])],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the customer name',
            'email.required' => 'Please enter an email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
            'status.required' => 'Please select a status',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => strtolower($this->email),
            'phone' => $this->phone ? preg_replace('/[^0-9+]/', '', $this->phone) : null,
        ]);
    }
}
