<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMollasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mollases', function (Blueprint $table) {
            $table->id();
            $table->integer('volume_t1')->nullable();
            $table->integer('volume_t2')->nullable();
            $table->integer('volume_t3')->nullable();
            $table->integer('meters')->nullable();
            $table->string('admin')->nullable();
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
        Schema::dropIfExists('mollases');
    }
}
