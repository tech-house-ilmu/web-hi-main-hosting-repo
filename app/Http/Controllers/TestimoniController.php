<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function testimoni()
    {
        // Ambil semua data testimoni dari database (urut terbaru)
        $testimonis = Testimoni::latest()->get();

        // Kirim ke tampilan blade
        return view('pages.index', compact('testimonis'));
    }
}
