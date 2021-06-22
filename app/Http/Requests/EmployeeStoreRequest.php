<?php

namespace App\Http\Requests;

use App\Rules\ThousandToNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class EmployeeStoreRequest extends FormRequest
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
            'nik' => [
                'required',
                // 'integer',
                new ThousandToNumber()
            ],
            'name' => [
                'required',
                'min:3'
            ]
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nik.required' => 'NIK harus diisi',
            'name.required' => 'Nama harus diisi',
        ];
    }

    public function response(array $errors)
    {
        // Optionally, send a custom response on authorize failure 
        // (default is to just redirect to initial page with errors)
        // 
        // Can return a response, a view, a redirect, or whatever else

        if ($this->ajax() || $this->wantsJson()) {
            return new JsonResponse($errors, 422);
        }
        return redirect('/');
    }
}
