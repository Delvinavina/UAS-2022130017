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
        Schema::table('transactions', function (Blueprint $table) {

            if (!Schema::hasColumn('transactions', 'status')) {
                $table->string('status')->default('Pending');
            }

            if (!Schema::hasColumn('transactions', 'payment_status')) {
                $table->string('payment_status')->default('Pending');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('payment_status');
        });
    }
};