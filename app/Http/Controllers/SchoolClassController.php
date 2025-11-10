<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schoolclasses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_name' => 'required|string|max:255',
            'teacher_email' => 'required|string|email|max:255',
            'class_website' => 'nullable|url|max:255',

        ]);

        SchoolClass::create([
            'name' => $validated['name'],
            'teacher_name' => $validated['teacher_name'],
            'teacher_email' => $validated['teacher_email'],
            'class_website' => $validated['class_website'],
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(request $request, string $id)
    {

        $schoolClass = SchoolClass::findOrFail($id);

        if ($request->user()->cannot('view', $schoolClass)) {
            return redirect()->route('dashboard');
        }

        $notes = $schoolClass->notes;

        return view('schoolclasses.show', [
            'schoolClass' => $schoolClass,
            'notes' => $notes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $schoolClass = SchoolClass::findOrFail($id);

        if ($request->user()->cannot('update', $schoolClass)) {
            return redirect()->route('dashboard');
        }

        return view('schoolclasses.edit', [
            'schoolClass' => $schoolClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $schoolClass = SchoolClass::findOrFail($id);

        if ($request->user()->cannot('update', $schoolClass)) {
            return redirect()->route('dashboard');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_name' => 'required|string|max:255',
            'teacher_email' => 'required|string|email|max:255',
            'class_website' => 'required|string|url|max:255',
        ]);

        $schoolClass->update([
            'name' => $validated['name'],
            'teacher_name' => $validated['teacher_name'],
            'teacher_email' => $validated['teacher_email'],
            'class_website' => $validated['class_website'],
        ]);

        return redirect()->route('schoolclasses.show', $id);
    }
}
