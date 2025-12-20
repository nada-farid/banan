<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTimelinesTable extends Migration
{
    public function up()
    {
        Schema::create('program_timelines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('duration')->nullable();
            $table->timestamps();
        });
    }
}
