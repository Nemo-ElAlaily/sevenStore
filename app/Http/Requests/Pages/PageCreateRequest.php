<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageCreateRequest extends FormRequest
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
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '.title' => ['required', Rule::unique('page_translations', 'title')],
                $locale . '.slug' => ['required', Rule::unique('page_translations', 'slug')],
                $locale . '.content' => ['required', Rule::unique('page_translations', 'content')],
                $locale . '.meta_title' => ['required', Rule::unique('page_translations', 'meta_title')],
                $locale . '.meta_description' => ['required', Rule::unique('page_translations', 'meta_description')],
                $locale . '.meta_keyword' => ['required', Rule::unique('page_translations', 'meta_keyword')],
            ];
        } // end of for each

        return $rules;
    }
}
