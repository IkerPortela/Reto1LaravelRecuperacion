<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Incidence;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::orderBy('name', 'asc')->get();
        return view('categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Categories();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $category)
    {
        $department = Department::find(Auth::user()->department_id);
        $incidences = Incidence::where('category_id', $category->id)->get();
        return view('incidences.index',['incidences'=>$incidences, 'department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        return view('categories.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Se ha borrado la categoria con sus incidencias asignadas');
    }
}