<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'registration_number', 'is_registered'
    ];

    /**
     ** Composite Query even in the case of a filter
     * @param array $filter
     * @return mixed
     */
    public static function getWithFilter(array $filter)
    {
        $query = self::orderBy('name');

        if($filter['isRegisteredFilter'] !== 'OFF')
            $query->where('is_registered', $filter['isRegisteredFilter']);

        return $query->get();
    }
}
