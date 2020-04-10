<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('billdate');
            $table->integer('billserial');
            $table->integer('party_id'); 
            $table->float('partypercentnew', '5', '2');
            $table->string('itemname');
            $table->float('beforemeltingweight', '5', '3');
            $table->float('aftermeltingweight', '5', '3');
            $table->float('sampleweight','5','3');
            $table->float('receivedweight');
            $table->float('fireassayweight', '5', '3');
            $table->float('refineweight', '5', '3');
            $table->float('assaypurity','5', '3');
            $table->float('cgst', '5', '2');
            $table->float('sgst', '5', '2');
            $table->float('totalamount', '10', '2');
            $table->text('remark');
            $table->float('clientpurity', '5', '2')->nullable();
            $table->integer('batchnumber')->nullable();
            $table->float('puritydifference', '5', '2')->nullable();
            $table->float('refinecharge', '5', '2')->nullable();
            $table->float('puresample', '5', '2')->nullable();
            $table->float('refinedweight', '5', '2')->nullable();
            $table->float('pureweight', '5', '2')->nullable();
            $table->text('tothecustomer')->nullable();
            $table->text('gain')->nullable();
            $table->date('issueddate')->nullable();
            $table->text('fineweight')->nullable();
            $table->text('fineweightwithcharge')->nullable();
            $table->text('cointype')->nullable();
            $table->text('coinissuedweight')->nullable();
            $table->text('totalbalance')->nullable();
            $table->text('description')->nullable();
            $table->text('coinremark')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
