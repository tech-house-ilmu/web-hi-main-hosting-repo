<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Position;
use App\Models\TestimoniAlumniCareer;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        $testimoniAlumni = Cache::remember('career_testimoni', 300, function () {
            return TestimoniAlumniCareer::latest()->get();
        });

        $divisions = Cache::remember('career_divisions', 300, function () {
            return Division::with(['positions' => fn($q) => $q->where('is_visible', true)])->get();
        });

        return view('pages.career.career', compact('testimoniAlumni', 'divisions'));
    }

    public function listByDivision(string $division): View
    {
        $divisionModel = Cache::remember("division_{$division}", 300, function () use ($division) {
            return Division::where('slug', $division)->firstOrFail();
        });

        $positions = Cache::remember("positions_{$division}", 300, function () use ($divisionModel) {
            return $divisionModel->positions()->where('is_visible', true)->get();
        });

        return view('pages.career.positions', [
            'division' => $divisionModel,
            'positions' => $positions,
        ]);
    }

    public function show(string $division, string $slug): View
    {
        $divisionModel = Cache::remember("division_{$division}", 300, function () use ($division) {
            return Division::where('slug', $division)->firstOrFail();
        });

        $position = Cache::remember("position_{$division}_{$slug}", 300, function () use ($divisionModel, $slug) {
            return Position::where('division_id', $divisionModel->id)
                ->where('slug', $slug)
                ->where('is_visible', true)
                ->firstOrFail();
        });

        return view('pages.career.position-details', [
            'position' => $position,
            'division' => $divisionModel,
        ]);
    }
}
