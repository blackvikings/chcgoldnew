<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('batchdate')->nullable();
            $table->float('collection', '8', '2')->nullable();
            $table->integer('batch')->nullable();
            $table->float('sample', '2', '1')->nullable();
            $table->float('puresample', '5', '3')->nullable();
            $table->float('refineweight', '8', '2')->nullable();
            $table->float('receivedweightwithss', '8', '3')->nullable();
            $table->float('nineninefive', '4', '3')->nullable();
            $table->float('expectedinc', '8', '2')->nullable();
            $table->float('refineshort', '8', '2')->nullable();
            $table->float('toberecovered', '8', '2')->nullable();
            $table->float('coinstock', '8', '2')->nullable();
            $table->float('cointype', '8', '2')->nullable();
            $table->float('loss', '8', '2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refines');
    }
}
