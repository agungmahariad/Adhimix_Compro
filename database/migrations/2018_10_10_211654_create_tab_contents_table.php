<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_contents', function (Blueprint $table) {
            $table->increments('idTab');
            $table->integer('idMenu');
            $table->string('headline');
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
        Schema::dropIfExists('tab_contents');
    }
}
