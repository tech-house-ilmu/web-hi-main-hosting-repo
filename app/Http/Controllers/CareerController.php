<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Position;
use App\Models\TestimoniAlumniCareer;
use Illuminate\View\View;

class CareerController extends Controller
{
    /**
     * Display the career landing page.
     */
    public function index(): View
    {
        $testimoniAlumni = TestimoniAlumniCareer::latest()->get();
        $divisions = Division::all();

        return view('pages.career.career', compact('testimoniAlumni', 'divisions'));
    }

    /**
     * Display positions for a given division.
     */
    public function listByDivision(string $division): View
    {
        $divisionModel = Division::where('slug', $division)->firstOrFail();
        $positions = $divisionModel->positions()->where('is_visible', true)->get();

        return view('pages.career.positions', [
            'division' => $divisionModel,
            'positions' => $positions,
        ]);
    }

    /**
     * Display a specific position's details.
     */
    public function show(string $division, string $slug): View
    {
        $divisionModel = Division::where('slug', $division)->firstOrFail();

        $position = Position::where('division_id', $divisionModel->id)
            ->where('slug', $slug)
            ->where('is_visible', true)
            ->firstOrFail();

        return view('pages.career.position-details', [
            'position' => $position,
            'division' => $divisionModel,
        ]);
    }
}
