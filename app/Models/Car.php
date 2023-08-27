<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'status',
        'is_rented',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
