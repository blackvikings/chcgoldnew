<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('issueDate')->nullable();
            $table->integer('invoiceno')->nullable();
            $table->integer('party_id')->nullable();
            $table->text('issueto')->nullable();
            $table->string('particular')->nullable();
            $table->double('purity', '5', '2')->nullable();
            $table->double('coinweight', '5', '2')->nullable();
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
        Schema::dropIfExists('issue_vouchers');
    }
}
