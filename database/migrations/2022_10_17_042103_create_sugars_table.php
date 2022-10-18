<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sample_id')->unique();
            $table->float('sulphur')->nullable();
            $table->float('diameter')->nullable();
            $table->integer('blackspot')->nullable();
            $table->float('sulphur_origin')->nullable();
            $table->float('diameter_origin')->nullable();
            $table->integer('blackspot_origin')->nullable();
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
        Schema::dropIfExists('sugars');
    }
}
