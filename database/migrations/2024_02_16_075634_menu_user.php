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
        Schema::create('MENU_USER', function (Blueprint $table) {
            $table->id('NO_SETING');
            $table->foreignId('ID_LEVEL', 30);
            $table->foreignId('MENU_ID', 3);
            $table->string('CREATE_DATE', 30)->nullable();
            $table->timestamp('CREATE_TIME')->nullable();
            $table->string('DELETE_MARK', 1)->nullable();
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MENU_USER');
    }
};
