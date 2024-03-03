<?php

namespace App\Http\Controllers;

use App\Models\Note;
use \Auth;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function __construct(){
        $this->middleware('owner')->only(['show', 'edit', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::where('user_id', Auth::user()->id)->get();
        return view('notes.index', compact(['notes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $isEdit = false;
        return view("notes.create-edit", compact(["isEdit"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|min:8|unique:notes,title",
            "description"=>"required|min:8",
        ]); 
        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->user_id = Auth::user()->id;
        $note->save();

        return redirect(route('notes.index'));
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('notes.show', compact(['note']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $isEdit = true;
        return view("notes.create-edit", compact(["isEdit"], "note"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note->title = $request->title;
        $note->description = $request->description;
        $note->user_id = Auth::user()->id;
        $note->update();
        return redirect(route('notes.show', $note->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect(route("home"));
    }
}
