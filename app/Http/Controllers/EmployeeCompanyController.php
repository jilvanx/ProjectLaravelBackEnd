<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EmployeeCompany as EmployeeCompanyResource;
use App\EmployeeCompany;

class EmployeeCompanyController extends Controller
{
    public function index()
    {
        
        $employeeCompany = new EmployeeCompany();
        $employeeCompany->nome = 'Julio Silva';
        $employeeCompany->empresa = 'Sony';

        return response([
            'data' => new EmployeeCompanyResource($employeeCompany),
            'status' => 'success'
        ]);
    }
}
