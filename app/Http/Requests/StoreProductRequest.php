<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string name
 * @property integer category_id
 * @property string url
 * @property float original_price
 * @property float discount_price
 * @property float purchase_price
 * @property string description
 * @property string meta_title
 * @property string meta_description
 * @property string meta_tags
 * @property bool in_stock
 * @property bool status
 *
 * Class StoreProductRequest
 * @package App\Http\Requests
 */

class StoreProductRequest extends FormRequest
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
            'name' => 'required',
            'url' => 'required'
        ];
    }
}
