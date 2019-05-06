<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('idPost');
            $table->integer('idMenu');
            $table->string('type');
            $table->string('title');
            $table->string('headline');
            $table->string('sortDesc');
            $table->string('kontenImage');
            $table->string('content');
            $table->integer('queue');
            $table->integer('activeLink');
            $table->integer('publish');
            $table->integer('createdBy');
            $table->integer('updatedBy');
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
        Schema::dropIfExists('posts');
    }
}
