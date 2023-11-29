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
        Schema::create('third_party_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('third_party_id')->nullable()->constrained('third_parties')->onDelete('set null');
//            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('set null');
            $table->string('product_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('third_party_products');
    }
};
