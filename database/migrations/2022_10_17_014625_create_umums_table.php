<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sample_id')->unique();
            $table->float('cao')->nullable();
            $table->float('ph')->nullable();
            $table->float('turbidity')->nullable();
            $table->float('temperature')->nullable();
            $table->float('cao_origin')->nullable();
            $table->float('ph_origin')->nullable();
            $table->float('turbidity_origin')->nullable();
            $table->float('temperature_origin')->nullable();
            $table->string('admin')->nullable();
            $table->string('master')->nullable();
            $table->string('corrector')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->boolean('correction')->default(0);
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
        Schema::dropIfExists('umums');
    }
}
