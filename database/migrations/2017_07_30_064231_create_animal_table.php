<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string("name", 255);
            $table->integer("dob")->nullable();
            $table->boolean("female")->default(true);
            $table->integer("father")->unsigned()->nullable();
            $table->integer("mother")->unsigned()->nullable();
            $table->boolean("active")->default(false);
            $table->boolean("own")->default(false);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::table('animal', function (Blueprint $table) {
            $table->foreign("father")->references("id")->on("animal");
            $table->foreign("mother")->references("id")->on("animal");
            $table->unique(["name", "dob"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
}
