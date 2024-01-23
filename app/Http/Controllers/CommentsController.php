<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Incidence;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comments::all();
        return view('incidences.show',['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comments();
        $comment->text = $request->text;
        $comment->usedTime = $request->usedTime;
        $comment->incidence_id = $request->incidence_id;
        $comment->user_id = auth()->id();
        $comment->save();
        return redirect()->route('incidences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comment)
    {
        return view('comments.edit',['commentary'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comment)
    {
        $incidences = Incidence::all();
        $comment->text = $request->text;
        $comment->save();
        return view('incidences.index',['incidences'=>$incidences]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comment)
    {
        $comment->delete();
        return redirect()->route('incidences.index');
    }
}