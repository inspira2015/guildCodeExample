<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LoanApplicationBorrowersJobHistory Extends Model
{
    /**
     * [$table Db table name]
     * @var string
     */
    protected $table = 'loan_application_borrowers_job_history';

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = true;
}
