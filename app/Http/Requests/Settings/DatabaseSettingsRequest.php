<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class DatabaseSettingsRequest extends FormRequest
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
            "DB_CONNECTION" => 'required',
            "DB_HOST" => 'required',
            "DB_PORT" => 'required',
            "DB_DATABASE" => 'required',
            "DB_USERNAME" => 'required',
            "DB_PASSWORD" => 'required',

            "WP_DB_CONNECTION" => 'required',
            "WP_DB_HOST" => 'required',
            "WP_DB_PORT" => 'required',
            "WP_DB_DATABASE" => 'required',
            "WP_DB_USERNAME" => 'required',
            "WP_DB_PASSWORD" => 'required',
        ];
    } // end of rules

    public function messages()
    {
        return [
            'required' => 'This Field is Required',
        ];
    }
}
