<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    /**
     * [$table Db table name]
     * @var string
     */
    protected $table = 'loan_application';

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = true;

}
