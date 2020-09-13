<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationBorrowersBanksAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_application_borrowers_banks_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_application_borrowers_id');
            $table->string('bank_name',50);
            $table->string('type');
            $table->date('balance_date');
            $table->decimal('balance', 8,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_application_borrowers_banks_accounts');
    }
}
