<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubLabInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_lab_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('all_lab_id')->index();
            $table->foreign('all_lab_id')->references('id')->on('all_labs')->onDelete('No Action')->onUpdate('No Action');
            $table->UnsignedBigInteger('lab_info_id')->index();
            $table->foreign('lab_info_id')->references('id')->on('lab_infos')->onDelete('No Action')->onUpdate('No Action');
            $table->string('name',100);
            $table->double('price')->default(0);
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
        Schema::dropIfExists('sub_lab_infos');
    }
}
