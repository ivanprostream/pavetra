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
        Schema::create('psyches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 100)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('gender')->default(1)->comment('1=man 0=not man');
            $table->string('notification', 100);
            $table->tinyInteger('is_active')->default(0)->comment('1=active 0=not active');
            $table->foreignId('currency_id')->constrained('currency');
            $table->foreignId('lang_id')->constrained('lang');
            $table->foreignId('country_id')->constrained('country');
            $table->foreignId('tariffplan_id')->constrained('tariffplan');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('psyches');
    }
};
