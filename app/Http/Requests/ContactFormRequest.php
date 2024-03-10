<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'integer'],
            'message' => ['required', 'string', 'max:500'],
            'email' => ['required', 'email:rfc,dns'],
            'attachment' => ['required', 'mimes:jpg,pdf', 'max:5120'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => __('Imię i nazwisko są wymagane.'),
            'fullname.max' => __('Imię i nazwisko nie mogą być dłuższe niż :max znaków.'),
            'phone.required' => __('Telefon jest wymagany.'),
            'phone.integer' => __('Telefon może zawierać same cyfry.'),
            'email.required' => __('Email jest wymagany.'),
            'email.email' => __('Email musi mieć prawidłowy format.'),
            'attachment.required' => __('Załącznik jest wymagany.'),
            'attachment.mimes' => __('Załącznik musi być plikiem o rozszerzeniu JPG lub PDF.'),
            'attachment.max' => __('Załącznik nie może być większy niż :max kilobajtów.'),
            'message.required' => __('Treść wiadomości jest wymagana.'),
            'message.max' => __('Treść wiadomości nie może być dłuższa niż :max znaków.'),
        ];
    }
}
