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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('NAMA_USER', 60);
            $table->string('USERNAME', 60);
            $table->string('password', 60);
            $table->string('email', 200)->unique();
            $table->string('NO_HP', 30)->nullable();
            $table->string('WA', 30)->nullable();
            $table->string('PIN', 30)->nullable();
            $table->foreignId('ID_JENIS_USER');
            $table->string('STATUS_USER', 30);
            $table->string('DELETE_MARK', 1)->nullable();
            $table->string('CREATE_BY', 30)->nullable();
            $table->timestamp('CREATE_DATE')->nullable();
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
        Schema::dropIfExists('users');
    }
};
