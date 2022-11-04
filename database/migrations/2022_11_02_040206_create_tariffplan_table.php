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
        Schema::create('tariffplan', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->nullable();
            $table->text('content')->nullable();
            $table->string('badge', 30);
            $table->decimal('price', 10, 2);
            $table->tinyInteger('is_active')->default(0)->comment('1=active 0=not active');
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
        Schema::dropIfExists('tariffplan');
    }
};
