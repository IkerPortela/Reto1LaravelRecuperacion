<?php

namespace App\Http\Controllers;

use App\Models\Incidence;
use App\Models\Department;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if(Auth::check()){
        $department = Department::find(Auth::user()->department_id);
        $incidences = Incidence::orderBy('created_at', 'desc')->get();
        return view('incidences.index',['incidences' => $incidences, 'department'=> $department]);
        }
        $incidences = Incidence::orderBy('created_at', 'desc')->get();
        return view('incidences.index',['incidences' => $incidences]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidence = new Incidence();
        $incidence->title = $request->title;
        $incidence->text = $request->text;
        $incidence->posted = $request->has('posted');
        $incidence->used_time = $request->used_time;
        $incidence->user_id = $request->user()->id;
        $incidence->category_id = $request->category_id;
        $incidence->department_id = $request->user()->department_id;
        $incidence->save();
        return redirect()->route('incidences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidence $incidence)
    {
        $comments = Comments::all();
        return view('incidences.show',compact(['incidence','comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidence $incidence)
    {
        return view('incidences.edit',['incidence'=>$incidence]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidence $incidence)
    {
        $incidence->title = $request->titulo;
        $incidence->text = $request->texto;
        $incidence->posted = $request->has('posted');
        $incidence->used_time = $request->used_time;
        $incidence->category_id = $request->category_id;
        $incidence->department_id = $request->department_id;
        $incidence->save();
        return view('incidences.show',['incidence'=>$incidence]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidence $incidence)
    {
        DB::delete('delete from incidences where id = :id', ['id' =>$incidence->id]);
        return redirect()->route('incidences.index') ->with('success', 'Se ha borrado la incidencia con sus comentarios');;;

    }
}