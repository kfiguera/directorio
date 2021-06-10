<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_number');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('extension')->nullable();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('title_id');
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('title_id')->references('id')->on('titles');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directories');
    }
}
