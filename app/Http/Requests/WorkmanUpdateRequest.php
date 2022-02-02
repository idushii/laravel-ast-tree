<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkmanUpdateRequest extends FormRequest
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
            'employed_id' => ['required', 'string', 'unique:workmen,employed_id'],
            'fio' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:100'],
            'comment' => ['string', 'max:100'],
            'year_birth' => ['required', 'integer'],
            'passport' => ['required', 'string', 'max:100'],
            'inn' => ['required', 'string', 'max:100'],
            'bank_card' => ['required', 'string', 'max:100'],
        ];
    }
}
