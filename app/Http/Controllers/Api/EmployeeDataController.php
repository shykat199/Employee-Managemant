<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\State;
use Illuminate\Http\Request;

class EmployeeDataController extends Controller
{

    public function countries(): \Illuminate\Http\JsonResponse
    {
        $countries=Country::all();
        return response()->json($countries);
    }

    public function states(Country $country): \Illuminate\Http\JsonResponse
    {

        return response()->json($country->state);
    }

    public function cities(State $state): \Illuminate\Http\JsonResponse
    {
        return response()->json($state->city);
    }

    public function departments(): \Illuminate\Http\JsonResponse
    {
        $departments=Department::all();
        return response()->json($departments);
    }


}
