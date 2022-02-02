<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceItemUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:400'],
            'template' => ['required', 'in:Companies,CompleteSet,Moving,LoadingUnloading'],
            'size' => ['required', 'integer'],
            'active' => ['required'],
            'object_item_id' => ['required', 'integer', 'exists:object_items,id'],
        ];
    }
}
