<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function getStatusInPolish()
    {
        $statuses = [
            'pending' => 'oczekujący',
            'approved' => 'zatwierdzony',
            'cancelled' => 'anulowany',
        ];

        return $statuses[$this->status] ?? $this->status;
    }
}
