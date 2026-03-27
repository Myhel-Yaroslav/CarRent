<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
    
    // Номерний знак як унікальний ідентифікатор
    protected $primaryKey = 'NumberPlate';
    public $incrementing = false;
    protected $keyType = 'string';

    //Автоматичні дати створення та оновлення
    public $timestamps = true;

    protected $fillable = [
        'NumberPlate', 
        'ModelID', 
        'Year', 
        'PricePerDay', 
        'Status', 
        'Conditionn'
    ];

    /**
     * Отримання назви марки та моделі
     */
    public function details()
    {
        return $this->belongsTo(CarModel::class, 'ModelID', 'ModelID');
    }

    /**
     * Пошук авто за номером у маршрутах
     */
    public function getRouteKeyName()
    {
        return 'NumberPlate';
    }
}