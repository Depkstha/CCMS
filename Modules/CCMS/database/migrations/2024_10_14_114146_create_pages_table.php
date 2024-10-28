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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            
            $table->text('title');
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();

            $table->json('section')->nullable();
            $table->string('banner')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();

            $table->string('template')->nullable();
            $table->string('type')->nullable();

            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keywords')->nullable();

            $table->text('sidebar_title')->nullable();
            $table->mediumText('sidebar_content')->nullable();
            $table->string('sidebar_image')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_target')->nullable();

            $table->timestamp('date')->nullable();
            $table->integer('status')->default(0);

            $table->integer('createdby')->unsigned()->nullable();
            $table->integer('updatedby')->unsigned()->nullable();
            $table->integer('order')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
