<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItemOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomor',
        'menu_id',
        'order_table_id',
        'jumlah'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function orderTable()
    {
        return $this->belongsTo(OrderTable::class, 'order_table_id');
    }

    public function dashboardCashier()
    {
        return $this->belongsTo(DashboardCashier::class,'cartitemorder_id');
    }


}