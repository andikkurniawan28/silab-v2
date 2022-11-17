<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaccharomatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saccharomats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sample_id')->constrained();
            $table->float('percent_brix')->nullable();
            $table->float('percent_pol')->nullable();
            $table->float('pol')->nullable();
            $table->float('purity')->nullable();
            $table->float('yield')->nullable();
            $table->float('percent_brix_origin')->nullable();
            $table->float('percent_pol_origin')->nullable();
            $table->float('pol_origin')->nullable();
            $table->float('purity_origin')->nullable();
            $table->float('yield_origin')->nullable();
            $table->string('analyst')->nullable();
            $table->string('preparation1')->nullable();
            $table->string('preparation2')->nullable();
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
        Schema::dropIfExists('saccharomats');
    }
}
