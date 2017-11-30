<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Company as CompanyResource;
use App\Company;
use App\Employee;

class CompanyController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return a collection of $companies with pagination
        return response([
            'data' => CompanyResource::collection(Company::paginate()),
            'status' => 'success'
        ]);
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Save the company
        $company = new Company;
        $company->name = $request['name'];
        $company->save();

        // Save all employees
        if (count($request->employees) > 0)
        {
            foreach ($request->employees as $item) {
                
                $employee = new Employee();
                $employee->company_id = $company->id;
                $employee->name = $item['name'];
                $employee->lastname = $item['lastname'];
                $employee->age = $item['age'];
                $employee->birth = $item['birth']; 
    
                $employee->save();
            }
        }

        
        return response([
            'data' => CompanyResource::collection(Company::paginate()),
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'data' => new CompanyResource(Company::findOrFail($id)),
            'status' => 'success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Company::findOrFail($id)->update($request->all());

        return response([
            'data' => new CompanyResource(Company::findOrFail($id)),
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::findOrFail($id)->delete();

        return response([
            'status' => 'success'
        ]);
    }

}
