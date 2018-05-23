<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaContentPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia_content_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_part_id')->unsigned();
            $table->foreign('content_part_id')->references('id')->on('content_parts');
            $table->string('title');
            $table->string('description');
            $table->string('filename');
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
        Schema::table('multimedia_content_parts', function (Blueprint $table) {
            $table->dropForeign('multimedia_content_parts_content_part_id_foreign');
        });
        Schema::dropIfExists('multimedia_content_parts');
    }
}
