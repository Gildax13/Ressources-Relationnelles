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
        Schema::create('adress', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('streetNum');
            $table->text('street');
            $table->bigInteger('postalCode');
            $table->text('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adress');
    }
};