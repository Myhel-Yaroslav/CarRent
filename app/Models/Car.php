<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
    protected $primaryKey = 'NumberPlate';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['NumberPlate', 'ModelID', 'Year', 'PricePerDay', 'Status', 'Conditionn'];

    // Зв'язок з таблицею моделей
    public function details()
    {
        return $this->belongsTo(CarModel::class, 'ModelID', 'ModelID');
    }

    public function getRouteKeyName()
    {
        return 'NumberPlate';
    }
}