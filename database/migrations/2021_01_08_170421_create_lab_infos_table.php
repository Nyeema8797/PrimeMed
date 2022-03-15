<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('all_lab_id')->index();
            $table->foreign('all_lab_id')->references('id')->on('all_labs')->onDelete('No Action')->onUpdate('No Action');
            $table->string('name',100);
            $table->string('slug',150)->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('lab_infos');
    }
}
