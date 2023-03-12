<?php

namespace App\Http\Requests\Part;

use App\Models\PartFilter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(PartFilter $partFilter)
    {
        return [
            'carFilter' => [Rule::in($partFilter->getCarFilter())]
        ];
    }
}
