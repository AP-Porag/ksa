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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entry_id')->nullable();
            $table->string('description_one')->nullable();
            $table->string('description_two')->nullable();
            $table->string('description_three')->nullable();
            $table->string('description_four')->nullable();
            $table->string('certification')->nullable();
            $table->string('grade')->nullable();
            $table->string('exp')->nullable();
            $table->string('auto_grade')->nullable();
            $table->string('status')->default(\App\Utils\GlobalConstant::STATUS_NOT_PRINTED)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labels');
    }
};
