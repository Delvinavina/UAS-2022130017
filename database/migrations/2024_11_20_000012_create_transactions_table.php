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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reser_id');
            $table->decimal('total_price', 10, 2);
            $table->enum('method', ['Bank Transfer', 'Credit Card', 'E-Wallet', 'QRIS']);
            $table->timestamps();

            $table->foreign('reser_id')->references('id')->on('reservations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};