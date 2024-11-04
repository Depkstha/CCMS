<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();

            $table->string('designation')->nullable();
            $table->string('degree')->nullable();
            $table->integer('branch_id')->unsigned()->nullable();

            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();

            $table->string('image')->nullable();
            $table->integer('status')->default(1);
            $table->integer('order')->unsigned()->nullable();

            $table->integer('createdby')->unsigned()->nullable();
            $table->integer('updatedby')->unsigned()->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('whatsapp')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
