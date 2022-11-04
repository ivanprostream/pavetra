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
        Schema::create('country_consts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('lang_id')->constrained('lang');
            $table->foreignId('country_const_type_id')->constrained('country_const_types');
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
        Schema::dropIfExists('country_consts');
    }
};
