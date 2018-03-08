<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAndChangePhoneColumnsInShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->renameColumn('phone_id', 'phone_one');
            $table->string('phone_two');
            $table->string('phone_three');
            $table->string('phone_four');
            $table->string('phone_five');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->renameColumn('phone_one', 'phone_id');
            $table->dropColumn(['phone_two','phone_three','phone_four','phone_five']);
        });
    }
}
