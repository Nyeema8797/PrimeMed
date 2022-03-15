<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('product_categories_id')->index();
            $table->foreign('product_categories_id')->references('id')->on('product_categories')->onDelete('No Action')->onUpdate('No Action');
            $table->string('name',100);
            $table->string('group',150)->nullable();
            $table->string('type',50);
            $table->string('quantity',50)->default(0);
            $table->string('piecesPerPata',10)->nullable();
            $table->string('dose',20)->nullable();
            $table->double('price')->default(0);
            $table->string('slug',100)->nullable();
            $table->string('size',50)->nullable();
            $table->string('imageName',150)->default('default.jpg');
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
        Schema::dropIfExists('products');
    }
}
