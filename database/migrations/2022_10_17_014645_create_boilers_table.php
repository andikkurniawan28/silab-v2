<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boilers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sample_id')->constrained()->unique();
            $table->float('tds');
            $table->float('ph');
            $table->float('hardness')->nullable();
            $table->float('phospate')->nullable();
            $table->float('tds_origin')->nullable();
            $table->float('ph_origin')->nullable();
            $table->float('hardness_origin')->nullable();
            $table->float('phospate_origin')->nullable();
            $table->string('analyst')->nullable();
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
        Schema::dropIfExists('boilers');
    }
}
