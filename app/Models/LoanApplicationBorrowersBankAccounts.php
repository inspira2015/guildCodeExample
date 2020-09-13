<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LoanApplicationBorrowersBankAccounts extends Model
{
    /**
     * [$table Db table name]
     * @var string
     */
    protected $table = 'loan_application_borrowers_banks_accounts';

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = true;
}
