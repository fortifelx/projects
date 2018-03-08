<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->mediumText('shortDescription');
            $table->longText('description');
            $table->string('email');
            $table->integer('phone_id');
            $table->mediumText('delivery');
            $table->mediumText('payment');
            $table->mediumText('guaranty');
            $table->mediumText('return');
            $table->longText('howBuy');
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
        Schema::dropIfExists('shops');
    }
}
