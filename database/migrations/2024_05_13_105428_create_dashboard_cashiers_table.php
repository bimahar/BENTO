<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dashboard_cashiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ordertable_id');
            $table->foreignId('cartitemorder_id');
            $table->integer('qty');
            $table->bigInteger('total_price');
            $table->enum('status', ['Unpaid','Paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_cashiers');
    }
};
