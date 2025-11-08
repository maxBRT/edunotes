<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $schoolclasses = $user->schoolclasses;
        $totalNotes = $user->schoolclasses()->withCount('notes')->get()->sum('notes_count');
        $totalClasses = $schoolclasses->count();

        return view('dashboard', [
            'schoolclasses' => $schoolclasses,
            'totalClasses' => $totalClasses,
            'totalNotes' => $totalNotes,
            'user' => $user,
        ]);
    }
}
