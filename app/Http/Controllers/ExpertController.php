<?php

namespace App\Http\Controllers;

use App\Models\Expert;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::where('is_active', true)->get();
        // return view('experts-list', ['experts' => $experts]);
    }
}
