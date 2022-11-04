<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->nullable();
            $table->string('url',150)->nullable();
            $table->string('short_text')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('link')->nullable();
            $table->tinyInteger('is_active')->default(0)->comment('1=active 0=not active');
            $table->smallInteger('sort')->default(0);
            $table->foreignId('psych_id')->constrained('psyches');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('country_id')->constrained('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
};
