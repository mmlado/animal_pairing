<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePairingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairing', function (Blueprint $table) {
            $table->integer("male", false, true);
            $table->integer("female", false, true);
            $table->decimal("compatibility", 6,3);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::table('pairing', function (Blueprint $table) {
            $table->foreign("male")->references("id")->on("animal");
            $table->foreign("female")->references("id")->on("animal");
            $table->unique(["male", "female"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pairing', function (Blueprint $table) {
            //
        });
    }
}
