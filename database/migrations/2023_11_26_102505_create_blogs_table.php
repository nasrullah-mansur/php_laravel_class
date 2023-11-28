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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            // $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->string('image_sm');
            $table->string('image_thumb');
            $table->string('image_alt')->nullable();
            $table->text('title');
            $table->text('slug');
            $table->longText('description');
            $table->longText('details');
            $table->longText('custom_html')->nullable();
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();
            $table->text('keyword')->nullable();
            $table->text('head_script')->nullable();
            $table->text('body_script')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
