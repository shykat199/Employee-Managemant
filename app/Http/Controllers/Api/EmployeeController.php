<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\EmployeeRequest;
use App\Http\Resources\EmployeeSingleResource;
use App\Http\Resources\EmplpyeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $employees = Employee::all();

        if ($request->search) {
            $employees = Employee::where('first_name', "like", "%{$request->search}%")
                ->orWhere('last_name', "like", "%{$request->search}%")
                ->get();
        } elseif ($request->department_id) {
            $employees = Employee::where('department_id', $request->department_id)->get();
        }


        return EmplpyeeResource::collection($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'middle_name' => $request->get('middle_name'),
            'address' => $request->get('address'),
            'department_id' => $request->get('department_id'),
            'country_id' => $request->get('country_id'),
            'state_id' => $request->get('state_id'),
            'city_id' => $request->get('city_id'),
            'zip_code' => $request->get('zip_code'),
            'birthdate' => $request->get('birthdate'),
            'date_hired' => $request->get('date_hired'),
        ]);

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return EmployeeSingleResource
     */
    public function show(Employee $employee): EmployeeSingleResource
    {
        return new EmployeeSingleResource($employee);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'middle_name' => $request->get('middle_name'),
            'address' => $request->get('address'),
            'department_id' => $request->get('department_id'),
            'country_id' => $request->get('country_id'),
            'state_id' => $request->get('state_id'),
            'city_id' => $request->get('city_id'),
            'zip_code' => $request->get('zip_code'),
            'birthdate' => $request->get('birthdate'),
            'date_hired' => $request->get('date_hired'),
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function destroy(Employee $employee): JsonResponse
    {
        $employee->delete();
        return response()->json('Employee Deleted Successfully');
    }
}
