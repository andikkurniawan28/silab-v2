<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaggasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baggases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sample_id')->constrained()->unique();
            $table->float('corrected_pol');
            $table->float('dry');
            $table->float('water');
            $table->float('corrected_pol_origin')->nullable();
            $table->float('dry_origin')->nullable();
            $table->float('water_origin')->nullable();
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
        Schema::dropIfExists('baggases');
    }
}
