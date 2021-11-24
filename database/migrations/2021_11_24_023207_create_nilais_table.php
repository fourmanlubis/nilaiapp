<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblnilai', function (Blueprint $table) {
             $table->id();
            $table->string("nim",11);
            $table->foreign("nim")->references("nim")->on("tblmahasiswa");
            $table->unsignedBigInteger("matakuliah_id");
            $table->foreign("matakuliah_id")->references("id")->on("tblmatakuliah");
            $table->smallInteger("nilai");
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
        Schema::dropIfExists('tblnilai');
    }
}
