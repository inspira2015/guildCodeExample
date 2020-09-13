<?php

namespace App\Http\Controllers\ApiControllers;
use App\Models\LoanApplication;
use App\Http\Controllers\Controller;

use App\Models\LoanApplicationBorrowers;
use App\Models\LoanApplicationBorrowersBankAccounts;
use App\Models\LoanApplicationBorrowersJobHistory;
use Illuminate\Http\Request;

class LoanApplicationController extends Controller
{

    public function index()
    {
        $allApplications = LoanApplication::all();
        return ['loan_applications' => $this->getAllApplications($allApplications)];
    }

    public function show(int $id)
    {
        return $this->getApplicationDetails($id);
    }

    protected function getAllApplications($loanApplication)
    {
        $returnArray = [];
        foreach ($loanApplication as $key => $value) {
            $returnArray[] = $this->getApplicationDetails($value->id);
        }
        return $returnArray;
    }

    protected function getApplicationDetails($loanApplicationId)
    {
        $loanApplication  = LoanApplication::find($loanApplicationId);
        $borrowers        = LoanApplicationBorrowers::GetBorrowersByLoanApplicationId($loanApplicationId);
        $borrowersDetails = $this->getBorrowerDetails($borrowers);

        return [
                    'loan_application' => $loanApplication,
                    'borrowers'        => $borrowersDetails,
               ];
    }

    protected function getBorrowerDetails($borrowers)
    {
        $resultArray = [];
        $count = 0;
       foreach ($borrowers as $key => $value)
       {
            $resultArray[$count]['borrower'] = $value;
            $resultArray[$count]['borrower']['details'] = $this->buildBorrowersDetailsArray($value->id);
            $count ++;
       }
       return $resultArray;
    }

    public function buildBorrowersDetailsArray($borrowerId)
    {
        $returnArray = [];
        $arrayDetails = [
             [
                'method'   => 'getBanksAccounts',
                'jsonName' => 'bank_accounts',
             ],
             [
                 'method'   => 'getJobHistory',
                 'jsonName' => 'job_history',
              ],
        ];

        foreach ($arrayDetails as $key => $value) {
            $returnArray[$value['jsonName']] =  call_user_func(array($this, $value['method']), $borrowerId);
        }
        return $returnArray;
    }

    protected function getBanksAccounts(int $borrowerId)
    {
        $bankAccount = LoanApplicationBorrowersBankAccounts::find($borrowerId);
        return $this->convertNullToEmptyArray($bankAccount);
    }

    protected function getJobHistory(int $borrowerId)
    {
        $jobHistory = LoanApplicationBorrowersJobHistory::find($borrowerId);
        return $this->convertNullToEmptyArray($jobHistory);
    }

    protected function convertNullToEmptyArray($value)
    {
        if ($value === null) {
            return [];
        }
        return $value;
    }
}
