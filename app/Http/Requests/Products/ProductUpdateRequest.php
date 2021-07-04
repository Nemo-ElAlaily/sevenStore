<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
           'stock' => 'required|numeric|min:1',
           'regular_price' => 'required',
           'sale_price' => 'required',
           'sku' => 'required',
           'main_category_id' => 'required',
           'image' => 'mimes:jpeg,bmp,png,gif',
       ];

       foreach (config('translatable.locales') as $locale) {
           $rules += [
               $locale . '.name' => ['required', Rule::unique('product_translations', 'name')],
               $locale . '.description' => ['required', Rule::unique('product_translations', 'description')],
               $locale . '.features' => ['required', Rule::unique('product_translations', 'features')],
           ];

       } // end of for each

       return $rules;

   } // end of rules

    public function messages()
    {
        return [
            'required' => 'Required',
            'numeric' => 'Should be a Number',
        ];
    } // end of messages

} // end of request
