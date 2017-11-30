<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Employee as EmployeeResource;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return a collection of $employees with pagination
        return response([
            'data' => EmployeeResource::collection(Employee::paginate()),
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
        $employee = new Employee();
        $employee->company_id = $request['company_id'];
        $employee->name = $request['name'];
        $employee->lastname = $request['lastname'];
        $employee->age = $request['age'];
        $employee->birth = $request['birth'];

        $employee->save();

        return response([
            'data' => EmployeeResource::collection(Employee::paginate()),
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
            'data' => new EmployeeResource(Employee::findOrFail($id)),
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
        Employee::findOrFail($id)->update($request->all());
        
        return response([
            'data' => new EmployeeResource(Employee::findOrFail($id)),
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
        Employee::findOrFail($id)->delete();
        
        return response([
            'status' => 'success'
        ]);
    }

}
