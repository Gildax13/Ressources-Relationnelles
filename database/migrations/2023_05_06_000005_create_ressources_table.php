<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use App\Models\Category;
use App\Models\Type;
use App\Models\User;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('content');
            $table->string('description');
            $table->string('file')->nullable()->default('file.pdf');
            $table->string('icon')->nullable()->default('icon.png');
            $table->foreignId('categories_id')->references('id')->on('categories');
            $table->foreignId('users_id')->references('id')->on('users');
            $table->foreignId('types_id')->references('id')->on('types');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
