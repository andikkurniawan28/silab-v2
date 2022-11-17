<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained();
            $table->foreignId('station_id')->constrained();
            $table->foreignId('method_id')->constrained();
            $table->integer('pan')->nullable();
            $table->integer('reef')->nullable();
            $table->integer('volume')->nullable();
            $table->string('operator')->nullable();
            $table->time('start_time')->nullable();
            $table->time('finish_time')->nullable();
            $table->string('admin');
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
        Schema::dropIfExists('samples');
    }
}
