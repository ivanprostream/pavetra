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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lang_id')->constrained('lang');
            $table->string('module')->nullable();
            $table->string('key_1')->nullable();
            $table->string('value_1')->nullable();
            $table->string('key_2')->nullable();
            $table->string('value_2')->nullable();
            $table->string('key_3')->nullable();
            $table->string('value_3')->nullable();
            $table->string('key_4')->nullable();
            $table->string('value_4')->nullable();
            $table->string('key_5')->nullable();
            $table->string('value_5')->nullable();
            $table->string('key_6')->nullable();
            $table->string('value_6')->nullable();
            $table->string('key_7')->nullable();
            $table->string('value_7')->nullable();
            $table->string('key_8')->nullable();
            $table->string('value_8')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
