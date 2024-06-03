<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardCashierTotal extends Model
{
    use HasFactory;

    protected $fillable = ['ordertable_id', 'total_price'];
}