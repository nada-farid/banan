<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProgramTimelinesTable extends Migration
{
    public function up()
    {
        Schema::table('program_timelines', function (Blueprint $table) {
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id', 'program_fk_10779172')->references('id')->on('programs');
        });
    }
}
