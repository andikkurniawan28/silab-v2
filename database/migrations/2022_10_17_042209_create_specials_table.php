<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sample_id')->constrained()->unique();
            $table->float('tsai')->nullable();
            $table->float('glucose')->nullable();
            $table->float('fructose')->nullable();
            $table->float('sucrose')->nullable();
            $table->float('preparation_index')->nullable();
            $table->float('fiber')->nullable();
            $table->float('calcium')->nullable();
            $table->float('optical_density')->nullable();
            $table->float('sugar_reducted')->nullable();
            $table->float('tsai_origin')->nullable();
            $table->float('glucose_origin')->nullable();
            $table->float('fructose_origin')->nullable();
            $table->float('sucrose_origin')->nullable();
            $table->float('preparation_index_origin')->nullable();
            $table->float('fiber_origin')->nullable();
            $table->float('calcium_origin')->nullable();
            $table->float('optical_density_origin')->nullable();
            $table->float('sugar_reducted_origin')->nullable();
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
        Schema::dropIfExists('specials');
    }
}
