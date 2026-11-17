<?php

namespace App\Http\Controllers;

use App\Models\TestimoniAlumniCareer;
use App\Models\Division;
use App\Models\Position;
use App\Models\RecruitmentAnnouncement;

class CareerController extends Controller
{
    public function index()
    {
        // Ambil semua data testimoni alumni, urutkan berdasarkan yang terbaru
        $testimoniAlumni = TestimoniAlumniCareer::orderBy('created_at', 'desc')->get();
        $announcement = RecruitmentAnnouncement::current();
        
        // Sesuaikan path dengan struktur folder: resources/views/pages/career/career.blade.php
        return view('pages.career.career', compact('testimoniAlumni', 'announcement'));
    }

    public function announcement()
    {
        $announcement = RecruitmentAnnouncement::current();
        return view('pages.career.announcement', compact('announcement'));
    }

    public function listByDivision($division)
    {
        // Ambil divisi berdasarkan slug
        $divisionModel = Division::where('slug', $division)->firstOrFail();

        // Ambil posisi yang is_visible = true di divisi tersebut
        $positions = $divisionModel->positions()->where('is_visible', true)->get();

        // Tampilkan ke blade universal positions
        return view('pages.career.positions', [
            'division' => $divisionModel,
            'positions' => $positions,
        ]);
    }

    public function show($division, $slug)
    {
        // Temukan division by slug
        $divisionModel = Division::where('slug', $division)->firstOrFail();

        // Cari posisi by slug dan divisi_id
        $position = Position::where('division_id', $divisionModel->id)
                            ->where('slug', $slug)
                            ->where('is_visible', true)
                            ->firstOrFail();

        // Tampilkan ke blade universal position-details
        return view('pages.career.position-details', [
            'position' => $position,
            'division' => $divisionModel,
        ]);
    }
}
