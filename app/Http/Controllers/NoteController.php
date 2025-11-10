<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class NoteController extends Controller
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

        Note::create([
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
    public function show(Request $request, string $id)
    {

        $note = Note::findOrFail($id);
        if ($request->user()->cannot('view', $note)) {
            return redirect()->route('dashboard');
        }

        return view('notes.show', [
            'note' => $note,
        ]);
    }

    public function edit(Request $request, string $id)
    {
        $note = Note::findOrFail($id);
        if ($request->user()->cannot('update', $note)) {
            return redirect()->route('dashboard');
        }

        return view('notes.edit', [
            'note' => $note,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {

        if ($request->user()->cannot('update', $note)) {
            return redirect()->route('dashboard');
        }

        $validated = $request->validated();

        $note->update($validated);

        return redirect()->route('notes.show', $note->id)
            ->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $note = Note::findOrFail($id);
        if ($request->user()->cannot('delete', $note)) {
            return redirect()->route('dashboard');
        }
        $classId = $note->school_class_id;
        $note->delete();

        return redirect()->route('schoolclasses.show', $classId)
            ->with('success', 'Note deleted successfully!');
    }
}
