<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageUpdateRequest extends FormRequest
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
                $locale . '.title' => ['required', Rule::unique('page_translations', 'title')->ignore($this->id, 'page_id')],
                $locale . '.slug' => ['required', Rule::unique('page_translations', 'slug')->ignore($this->id, 'page_id')],
                $locale . '.content' => ['required', Rule::unique('page_translations', 'content')->ignore($this->id, 'page_id')],
                $locale . '.meta_title' => ['required', Rule::unique('page_translations', 'meta_title')->ignore($this->id, 'page_id')],
                $locale . '.meta_description' => ['required', Rule::unique('page_translations', 'meta_description')->ignore($this->id, 'page_id')],
                $locale . '.meta_keyword' => ['required', Rule::unique('page_translations', 'meta_keyword')->ignore($this->id, 'page_id')],
            ];
        } // end of for each

        return $rules;
    }
}
