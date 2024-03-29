<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('ticket_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message_body');
            $table->bigInteger('ticket_id')->unsigned();
            $table->bigInteger('created_by')->unsigned();
            $table->timestamp('created_at');
            $table->softDeletes();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket_messages');
    }
}
