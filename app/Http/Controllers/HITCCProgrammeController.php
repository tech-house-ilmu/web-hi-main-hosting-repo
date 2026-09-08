<?php

namespace App\Http\Controllers;

use App\Models\HITCCCategory;
use App\Models\HITCCProgramme;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HITCCProgrammeController extends Controller
{
    /**
     * Display a listing of opportunities with optional category and search filtering.
     */
    public function index(Request $request): View|string
    {
        $category = $request->get('category');
        $search = $request->get('search');

        $query = HITCCProgramme::with('category');

        if ($category && $category !== 'all') {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        if ($search) {
            $searchLower = strtolower($search);
            $query->where(function ($q) use ($searchLower) {
                $q->whereRaw('LOWER(title_program) LIKE ?', ["%{$searchLower}%"])
                    ->orWhereRaw('LOWER(company_name) LIKE ?', ["%{$searchLower}%"]);
            });
        }

        $opportunities = $query->orderBy('sort_order')->paginate(20)->withQueryString();
        $categories = HITCCCategory::all();

        if ($request->ajax()) {
            return view('partials.hitcc-cards', compact('opportunities'))->render();
        }

        return view('pages.programme.HI-opportunities.index', compact('opportunities', 'categories'));
    }

    /**
     * Display details of a specific programme opportunity.
     */
    public function show(string $category, string $slug): View
    {
        $programme = HITCCProgramme::whereHas('category', function ($q) use ($category) {
            $q->where('slug', $category);
        })
            ->with(['category', 'internship', 'volunteer', 'scholarship', 'exchange', 'competition'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.programme.HI-opportunities.detail-opportunities', compact('programme'));
    }
}
