<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRafactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rafactions', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->unique();
            $table->integer('spot');
            $table->string('register')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('cooperative')->nullable();
            $table->string('outpost')->nullable();
            $table->string('program')->nullable();
            $table->string('truck_number')->nullable();
            $table->string('farmer')->nullable();
            $table->integer('pucuk')->nullable();
            $table->integer('sogolan')->nullable();
            $table->integer('daduk')->nullable();
            $table->integer('akar')->nullable();
            $table->integer('tali')->nullable();
            $table->integer('terbakar')->nullable();
            $table->integer('muda')->nullable();
            $table->integer('lelesan')->nullable();
            $table->string('score')->nullable();
            $table->string('analyst')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rafactions');
    }
}
