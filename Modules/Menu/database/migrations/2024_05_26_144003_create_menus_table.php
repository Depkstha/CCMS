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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('menu_location_id')->nullable();
            $table->string('title')->nullable();
            $table->string('alias')->nullable();
            $table->string('target')->default('_self');
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->integer('order')->nullable();
            $table->string('type')->nullable();
            $table->integer('status')->nullable();
            $table->text('parameter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
