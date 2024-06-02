<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nomor', 'special_message'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cartItemOrders()
    {
        return $this->hasMany(CartItemOrder::class);
    }

    public function dashboardCashier()
    {
        return $this->hasOne(DashboardCashier::class);
    }

    
}
