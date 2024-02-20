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
        Schema::create('USER_ACTIVITY', function (Blueprint $table) {
            $table->id('NO_ACTIVITY');
            $table->foreignId('ID_USER');
            $table->string('DISCRPISI', 300);
            $table->string('STATUS', 30);
            $table->foreignId('MENU_ID');
            $table->string('DELETE_MARK', 1);
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('USER_ACTIVITY');
    }
};
