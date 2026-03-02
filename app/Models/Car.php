<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';

    // Первинний ключ
    protected $primaryKey = 'NumberPlate';
    public $incrementing = false;
    protected $keyType = 'string';

    // Відключення мітки часу, бо я використовував стару БД
    public $timestamps = false;

    protected $fillable = [
        'NumberPlate', 
        'ModelID', 
        'Year', 
        'Conditionn', 
        'Status', 
        'PricePerDay'
    ];
}