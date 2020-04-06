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
            $table->string('billid', 250);
            $table->bigIncrements('party_id'); 
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
            $table->text('totalamount');
            $table->text('remark');
            $table->text('clientpurity');
            $table->text('batchnumber');
            $table->text('puritydifference');
            $table->text('refinecharge');
            $table->text('puresample');
            $table->text('refinedweight');
            $table->text('pureweight');
            $table->text('tothecustomer');
            $table->text('gain');
            $table->date('issueddate');
            $table->text('fineweight');
            $table->text('fineweightwithcharge');
            $table->text('cointype');
            $table->text('coinissuedweight');
            $table->text('totalbalance');
            $table->text('description');
            $table->text('coinremark');
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
