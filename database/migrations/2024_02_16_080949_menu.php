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
        Schema::create('MENU', function (Blueprint $table) {
            $table->id('MENU_ID');
            $table->foreignId('ID_LEVEL', 30);
            $table->string('MENU_NAME', 300);
            $table->string('MENU_LINK', 300);
            $table->string('MENU_ICON', 300);
            $table->string('STATUS_MENU', 300);
            $table->string('PARENT_ID', 30);
            $table->string('CREATE_BY', 30)->nullable();;
            $table->timestamp('CREATE_DATE')->nullable();;
            $table->string('DELETE_MARK', 1)->nullable();;
            $table->string('UPDATE_BY', 30)->nullable();;
            $table->timestamp('UPDATE_DATE')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MENU');
    }
};
