<?php

namespace App\Http\Controllers\ApiControllers;
use App\Models\LoanApplication;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoanApplicationController extends Controller
{
    //

    public function index()
    {
        return LoanApplication::all();
    }

    public function show($id)
    {
        return LoanApplication::find($id);
    }
}
