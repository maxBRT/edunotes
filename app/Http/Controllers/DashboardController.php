<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;

class DashboardController extends Controller
{
    public function index()
    {
        $schoolclasses = SchoolClass::all();
        return view('dashboard', [
            'schoolclasses' => $schoolclasses
        ]);
    }
}
