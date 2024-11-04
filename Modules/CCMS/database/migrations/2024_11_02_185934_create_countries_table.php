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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('slug')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->string('image')->nullable();
            $table->text('images')->nullable();

            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->text('sidebar_title')->nullable();
            $table->mediumText('sidebar_content')->nullable();
            $table->string('sidebar_image')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_target')->nullable();

            $table->integer('status')->default(1);

            $table->integer('createdby')->unsigned()->nullable();
            $table->integer('updatedby')->unsigned()->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
