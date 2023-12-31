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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier_id');
            $table->integer('type_id');
            $table->string('name');
            $table->integer('power_id');
            $table->integer('unit_id');
            $table->integer('rack_id');
            $table->float('purchases_quantity')->default(0);
            $table->float('sales_quantity')->default(0);
            $table->float('purchases_price')->default(0);
            $table->float('sales_price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
