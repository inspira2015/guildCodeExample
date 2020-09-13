<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LoanApplicationBorrowers extends Model
{
    /**
     * [$table Db table name]
     * @var string
     */
    protected $table = 'loan_application_borrowers';

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = true;

    public function scopeGetBorrowersByLoanApplicationId($query, $loanApplicationId)
    {
        return $query->select(['*'])
                     ->where('loan_application_id', '=', $loanApplicationId)
                     ->get();
    }

}
