<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('short_description');
            $table->longText('description');
            $table->longText('description_2');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('group');
            $table->timestamps();
        });
    }
}
