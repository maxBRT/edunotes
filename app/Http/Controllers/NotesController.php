<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Notes;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $schoolClassId = $request->query('school_class_id');
        $schoolClass = SchoolClass::findOrFail($schoolClassId);

        return view('notes.create', [
            'schoolClass' => $schoolClass,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $validated = $request->validated();

        Notes::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'school_class_id' => $validated['school_class_id'],
        ]);

        return redirect()->route('schoolclasses.show', $validated['school_class_id'])
            ->with('success', 'Note created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Notes::findOrFail($id);

        return view('notes.show', [
            'note' => $note,
        ]);
    }

    public function edit(string $id)
    {
        $note = Notes::findOrFail($id);

        return view('notes.edit', [
            'note' => $note,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
        $note = Notes::findOrFail($id);
        $validated = $request->validated();

        $note->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('notes.show', $note->id)
            ->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Notes::findOrFail($id);
        $classId = $note->school_class_id;
        $note->delete();

        return redirect()->route('schoolclasses.show', $classId)
            ->with('success', 'Note deleted successfully!');
    }
}
