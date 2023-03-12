<?php

namespace App\Http\Requests\Car;

use App\Models\CarFilter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(CarFilter $carFilter)
    {
        return [
            'isRegisteredFilter' => [Rule::in($carFilter->getIsRegistratedFilter())],
        ];
    }
}
