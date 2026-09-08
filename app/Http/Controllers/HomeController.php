<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Expert;
use App\Models\HITCCProgramme;
use App\Models\Testimoni;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index(): View
    {
        $events = Event::where('is_active', true)->latest()->get();
        $experts = Expert::where('is_active', true)->get();

        $programmes = HITCCProgramme::with([
            'internship',
            'volunteer',
            'scholarship',
            'exchange',
            'competition',
            'category',
        ])
            ->orderBy('sort_order')
            ->take(7)
            ->get();

        $testimonis = Testimoni::latest()->get();

        return view('pages.index', compact('events', 'experts', 'programmes', 'testimonis'));
    }
}
