<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('room_id')->unsigned()->nullable(false);
            $table->bigInteger('user_id')->unsigned()->nullable(false);
            $table->text('text')->nullable(false);
            $table->timestamps();

            $table->foreign('room_id')->on('rooms')->references('id')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
