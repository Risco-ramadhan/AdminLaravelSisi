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
        Schema::create('USER_FOTO', function (Blueprint $table) {
            $table->id('NO_FOTO');
            $table->foreignId('ID_USER');
            $table->string('FOTO',200);
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE');
            $table->string('DELETE_MARK', 1);
            $table->string('UPDATE_BY', 30);
            $table->timestamp('UPDATE_DATE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('USER_FOTO');

    }
};
