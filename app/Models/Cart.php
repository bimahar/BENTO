<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'timestamps'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function cartItemsOrder()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function orderTables()
    {
        return $this->hasOne(OrderTable::class);
    }
}
