<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Expert;
use App\Models\HITCCProgramme;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $events = Cache::remember('home_events', 300, function () {
            return Event::where('is_active', true)->latest()->get();
        });

        $experts = Cache::remember('home_experts', 300, function () {
            return Expert::where('is_active', true)->get();
        });

        $programmes = Cache::remember('home_programmes', 300, function () {
            return HITCCProgramme::with([
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
        });

        $testimonis = Cache::remember('home_testimonis', 300, function () {
            return Testimoni::latest()->get();
        });

        return view('pages.index', compact('events', 'experts', 'programmes', 'testimonis'));
    }
}
