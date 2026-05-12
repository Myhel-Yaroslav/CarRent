<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';

    protected $primaryKey = 'ReservationID';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'NumberPlate',
        'DateFrom',
        'DateTo',
        'Status',
        'ClientID', 
        'StartMileageAtRent',
        'EndMileageAtEnd'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'NumberPlate', 'NumberPlate');
    }
}