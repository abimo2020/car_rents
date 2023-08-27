<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'car_id',
        'rented_at',
        'returned_at',
        'driver_name',
        'admin_approval',
        'head_approval',
    ];
    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
