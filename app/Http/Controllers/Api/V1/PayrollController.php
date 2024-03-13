<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Payroll;
use App\Http\Controllers\Controller;
use App\Http\Resources\PayrollResource;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payrolls = Payroll::all();
        return PayrollResource::collection($payrolls);
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Payroll $payroll)
    {
        //
    }


    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    public function destroy(Payroll $payroll)
    {
        //
    }
}
