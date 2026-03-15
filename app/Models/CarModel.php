<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'model';
    protected $primaryKey = 'ModelID';
    public $timestamps = false;

    // Вказуємо правильну назву колонки з бази: ModelName
    protected $fillable = ['Brand', 'ModelName', 'Class'];
}