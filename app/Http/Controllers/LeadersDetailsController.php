<?php

namespace App\Http\Controllers;

use App\Models\LeadersDetailsAbout;
use Illuminate\View\View;

class LeadersDetailsController extends Controller
{
    /**
     * Display the About Us page with leadership details.
     */
    public function index(): View
    {
        $leaders = LeadersDetailsAbout::latest()->get();

        return view('pages.about-us.about', [
            'leaders' => $leaders,
            'LeadersDetailsAbout' => $leaders,
        ]);
    }

    /**
     * Backward-compatible alias for previous method name.
     */
    public function LeadersDetails(): View
    {
        return $this->index();
    }
}
