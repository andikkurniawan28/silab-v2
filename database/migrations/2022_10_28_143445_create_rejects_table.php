<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejects', function (Blueprint $table) {
            $table->id();
            $table->float('weight');
            $table->float('weight_origin')->nullable();
            $table->string('admin')->nullable();
            $table->string('corrector')->nullable();
            $table->boolean('correction')->default(0);
            $table->date('created_at')->useCurrent()->unique();
            $table->date('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rejects');
    }
}
