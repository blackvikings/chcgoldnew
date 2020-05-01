<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestingVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('issueDate')->nullable();
            $table->integer('invoiceno')->nullable();
            $table->integer('party_id')->nullable();
            $table->double('rupees', '5', '2')->nullable();
            $table->string('figures')->nullable();
            $table->string('words')->nullable();
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
        Schema::dropIfExists('testing_vouchers');
    }
}
