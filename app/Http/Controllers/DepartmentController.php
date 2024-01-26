<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Incidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index',['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->save();
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        $incidences = Incidence::where('department_id', $department->id)->get();
        return view('incidences.index',['incidences'=>$incidences, 'department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $department->name = $request->name;
        $department->save();
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
             if($department->incidence()->exists() || $department->user()->exists()){
                 return redirect()->route('departments.index')->with('error', 'No se puede borrar un departamento con usuarios o incidencias asociadas');
             }
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Se ha borrado el departamento');
        
    }

}