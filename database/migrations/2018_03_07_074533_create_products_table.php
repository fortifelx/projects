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
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('price')->default(0);
            $table->string('oldPrice')->nullable()->default(null);
            $table->string('width');
            $table->string('height');
            $table->string('depth');
            $table->longText('description');
            $table->integer('category_id')->nullable();
            $table->integer('producer_id')->nullable();
            $table->integer('is_published')->default(0);
            $table->integer('is_promotion')->default(0);
            $table->string('video');
            $table->string('illustration');
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
