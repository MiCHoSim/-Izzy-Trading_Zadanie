<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'serial_number', 'car_id'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    /**
     ** Composite Query even in the case of a filter
     * @param array $filter
     * @return mixed
     */
    public static function getWithFilter(array $filter)
    {
        $query = self::orderBy('name');

        if($filter['carFilter'] !== 'OFF')
            $query->where('car_id', $filter['carFilter']);

        return $query->get();
    }
}
