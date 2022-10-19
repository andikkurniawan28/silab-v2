<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreSmallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_smalls', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->unique();
            $table->string('batch')->nullable();
            $table->string('register')->nullable();
            $table->string('cooperative')->nullable();
            $table->string('outpost')->nullable();
            $table->string('program')->nullable();
            $table->float('percent_brix')->nullable();
            $table->float('percent_pol')->nullable();
            $table->float('yield')->nullable();
            $table->float('percent_brix_origin')->nullable();
            $table->float('percent_pol_origin')->nullable();
            $table->float('yield_origin')->nullable();
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
        Schema::dropIfExists('core_smalls');
    }
}
