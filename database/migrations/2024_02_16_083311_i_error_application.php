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
        Schema::create('I_ERROR_APPLICATION', function (Blueprint $table) {
            $table->id('ERROR_ID');
            $table->foreignId('ID_USER');
            $table->string('ERROR_DATE',3);
            $table->string('MODULES',100);
            $table->string('CONTROLLER',200);
            $table->string('ERROR_LINE',200);
            $table->string('ERROR_MESSAGE',1000);
            $table->string('STATUS',30);
            $table->string('PARAM',30);
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
        Schema::dropIfExists('I_ERROR_APPLICATION');
    }
};
