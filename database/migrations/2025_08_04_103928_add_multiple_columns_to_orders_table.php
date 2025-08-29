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
        Schema::table('orders', function (Blueprint $table) {
             $table->string('name')->after('user_id');
             $table->text('address')->after('name');
        $table->string('phone')->after('address');
        $table->decimal('amount', 8, 2)->after('phone');
        $table->text('email', 8, 2)->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
           $table->dropColumn(['name', 'address', 'phone', 'amount', 'email']);
        });
    }
};
