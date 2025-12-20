<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHawkmasTable extends Migration
{
    public function up()
    {
        Schema::table('hawkmas', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_10779130')->references('id')->on('hawkma_categories');
        });
    }
}
