<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('cart_item_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('nomor');
            $table->foreignId('menu_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_table_id')->constrained('order_tables')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_item_orders');
    }
}
