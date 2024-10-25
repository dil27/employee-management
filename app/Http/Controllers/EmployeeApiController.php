<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return $employees;
    }

    public function employeeById($id)
    {
        return Employee::findOrFail($id);
    }

    public function employeeByName($name)
    {
        $employees = Employee::where('name', 'like', '%'. $name .'%')->get();
        return $employees;
    }

    public function employeeByDepartment($department)
    {
        $employees = Employee::where('department', 'like', '%'. $department .'%')->get();
        return $employees;
    }

    public function employeeByPosition($position)
    {
        $employees = Employee::where('position', 'like', '%'. $position .'%')->get();
        return $employees;
    }
}
