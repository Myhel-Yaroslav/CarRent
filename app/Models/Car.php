<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';

    protected $primaryKey = 'NumberPlate';
    public $incrementing = false;
    protected $keyType = 'string';

    // Вимикання полів created_at та updated_at
    public $timestamps = false;

    // Дозвіл на заповнення полів в БД
    protected $fillable = [
        'NumberPlate', 
        'ModelID', 
        'Year', 
        'Conditionn', 
        'Status', 
        'PricePerDay'
    ];
}