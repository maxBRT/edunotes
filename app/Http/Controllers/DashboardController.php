<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $schoolclasses = $user->schoolclasses;
        return view('dashboard', [
            'schoolclasses' => $schoolclasses
        ]);
    }
}
