<?php

namespace App\Http\Requests\MainCategories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MainCategoryUpdateRequest extends FormRequest
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
        $rules = [
            'parent_id' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '.name' => ['required'],
            ];

        } // end of for each

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Required',
            'numeric' => 'Should be a Number',
            'unique' => 'Already Taken',
        ];
    } // end of messages
}
