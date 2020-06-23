<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Http\Resources\employeeResource;
use App\Http\Requests\employeeStoreRequest as StoreRequest;
use App\Http\Requests\employeeUpdateRequest as UpdateRequest;


class employeeCont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return employeeResource::collection($employees);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $employee = Employee::create([
          'name' => $request->name,
          'jabatan' => $request->jabatan,
          'gaji' => $request->gaji
        ]);
        return new employeeResource($employee);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $employee = Employee::where('id', $id)->first();

       // return only 1 data
       return new EmployeeResource($employee);
   }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $employee = Employee::where('id',$id)->first();

        $employee->update([
          'name' => $request->name,
          'jabatan' => $request->jabatan,
          'gaji' => $request->gaji
        ]);
        return new employeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->first();

        $employee->delete();
    }
}
