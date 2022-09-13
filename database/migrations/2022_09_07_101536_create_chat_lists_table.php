<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_lists', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('img2');
            $table->string('title');
            $table->string('artist');
            $table->string('albumName');
            $table->date('createDate');
            $table->time('playlist');
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
        Schema::dropIfExists('chat_lists');
    }
}
