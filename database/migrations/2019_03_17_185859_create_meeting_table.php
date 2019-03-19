<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingTable extends Migration
{
    public function up()
    {
        Schema::create("meetings", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->timestamps();
            $table->softDeletes();
            $table->date('time');
            $table->string('title');
            $table->text('description');
            $table->integer('audits');
            $table->integer('auditsLimit');
        });

    }

    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
