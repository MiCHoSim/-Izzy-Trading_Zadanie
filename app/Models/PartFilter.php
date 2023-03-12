<?php

namespace App\Models;

use App\Http\Requests\Part\FilterRequest;

class PartFilter
{
    /**
     * Filter constants.
     */
    const OFF = 'OFF';

    /**
     ** Creates the current filter
     * @param FilterRequest $request
     * @return array
     */
    public function getActiveFilter(FilterRequest $request) : array
    {
        return isset($request->all()['carFilter'])
            ? $request->all()
            : ['carFilter' => self::OFF];
    }

    /**
     ** Composite filter for car
     * @return array
     */
    public function getCarFilter() : array
    {
        return ['OFF' => 'OFF'] +
            Car::orderBy('name')->get()->pluck('id', 'name')->toArray() ;
    }
}
