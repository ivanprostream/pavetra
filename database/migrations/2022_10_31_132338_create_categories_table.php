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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('parent')->nullable();
            $table->string('name',150)->nullable();
            $table->string('url',150)->nullable();
            $table->string('path')->nullable();
            $table->string('short_text')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('is_active')->default(0)->comment('1=active 0=not active');
            $table->tinyInteger('in_tags')->default(0)->comment('0=not show 1=show home 2=show sidebar 3=show everywhere');
            $table->tinyInteger('sort')->default(0);
            $table->foreignId('lang_id')->constrained('lang');
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
        Schema::dropIfExists('categories');
    }
};
