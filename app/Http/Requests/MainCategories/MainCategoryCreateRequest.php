<?php

namespace App\Http\Requests\MainCategories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MainCategoryCreateRequest extends FormRequest
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
                $locale . '.name' => ['required', Rule::unique('main_category_translations', 'name')],
            ];

        } // end of for each

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Required',
            'numeric' => 'Should be a Number',
        ];
    } // end of messages

}
