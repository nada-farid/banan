<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('program_teams', function (Blueprint $table) {
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id', 'program_team_fk')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_teams', function (Blueprint $table) {
            $table->dropForeign('program_team_fk');
            $table->dropColumn('program_id');
        });
    }
};
