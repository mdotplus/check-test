<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => ['required'],
            'first_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'tel_area_code' => ['required', 'digits_between:1,5'],
            'tel_city_code' => ['required', 'digits_between:1,5'],
            'tel_subscriber_number' => ['required', 'digits_between:1,5'],
            'address' => ['required'],
            'building' => [],
            'content' => ['required'],
            'detail' => ['required', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel_area_code.required' => '電話番号を入力してください',
            'tel_area_code.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel_city_code.required' => '電話番号を入力してください',
            'tel_city_code.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel_subscriber_number.required' => '電話番号を入力してください',
            'tel_subscriber_number.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'content.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
