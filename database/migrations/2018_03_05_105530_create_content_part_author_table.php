<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentPartAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_part_author', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_part_id')->unsigned();
            $table->foreign('content_part_id')->references('id')->on('content_parts');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_part_author', function (Blueprint $table) {
            $table->dropForeign('content_part_author_content_part_id_foreign');
            $table->dropForeign('content_part_author_author_id_foreign');
        });
        Schema::dropIfExists('content_part_author');
    }
}
