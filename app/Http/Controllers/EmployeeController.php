<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function view($id)
    {
        try {
            $employee = Employee::findOrFail($id);

            return view('employees.show', compact('employee'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('employees.index')->with('error', 'Pegawai tidak ditemukan.');
        }
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'join_date' => 'required|date',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('photo')) {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
            $validated['photo'] = 'uploads/' . $fileName;
        }
        
        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'join_date' => 'required|date_format:d/m/Y',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        $validated['join_date'] = Carbon::createFromFormat('d/m/Y', $validated['join_date'])->format('Y-m-d');
        
        if ($request->hasFile('photo')) {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
            $validated['photo'] = 'uploads/' . $fileName;
        }
        
        $employee->update($validated);
        return redirect()->route('employees.show', $employee->id)->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->photo && file_exists(public_path($employee->photo))) {
            unlink(public_path($employee->photo));
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}