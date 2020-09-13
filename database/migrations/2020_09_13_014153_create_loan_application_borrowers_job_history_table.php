<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationBorrowersJobHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_application_borrowers_job_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_application_borrowers_id');
            $table->string('job_title');
            $table->string('company_name');
            $table->decimal('annual_income', 8,2);
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
        Schema::dropIfExists('loan_application_borrowers_job_history');
    }
}
