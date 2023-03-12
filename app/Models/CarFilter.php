<?php

namespace App\Models;

use App\Http\Requests\Car\FilterRequest;

class CarFilter
{
    /**
     * Filter constants.
     */
    const OFF = 'OFF';
    const YES = 'Yes';
    const NO = 'No';

    /**
     ** Creates the current filter
     * @param FilterRequest $request
     * @return string[]
     */
    public function getActiveFilter(FilterRequest $request) : array
    {
        return isset($request->all()['isRegisteredFilter'])
            ? $request->all()
            : ['isRegisteredFilter' => self::OFF];
    }

    /**
     ** Composite filter for is_registration
     * @return array
     */
    public function getIsRegistratedFilter() : array
    {
        return [
            self::OFF => 'OFF',
            self::YES => 1,
            self::NO => 0
        ];
    }
}
