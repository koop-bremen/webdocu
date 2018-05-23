<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentPartPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_part_person', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_part_id')->unsigned();
            $table->foreign('content_part_id')->references('id')->on('content_parts');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_part_person', function (Blueprint $table) {
            $table->dropForeign('content_part_person_content_part_id_foreign');
            $table->dropForeign('content_part_person_person_id_foreign');
        });
        Schema::dropIfExists('content_part_person');
    }
}
