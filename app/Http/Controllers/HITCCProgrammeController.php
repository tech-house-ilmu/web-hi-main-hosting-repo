<?php

namespace App\Http\Controllers;

use App\Models\HITCCCategory;
use App\Models\HITCCProgramme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HITCCProgrammeController extends Controller
{
    public function index(Request $request): View|string
    {
        $category = $request->get('category');
        $search = $request->get('search');
        $sort = $request->get('sort', 'deadline_asc');

        $query = HITCCProgramme::with(['category', 'internship', 'volunteer', 'scholarship', 'exchange', 'competition']);

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

        match ($sort) {
            'deadline_asc' => $query->orderBy('registration_deadline', 'asc'),
            'deadline_desc' => $query->orderBy('registration_deadline', 'desc'),
            'latest' => $query->orderBy('created_at', 'desc'),
            default => $query->orderBy('sort_order', 'asc'),
        };

        $opportunities = $query->paginate(6)->withQueryString();
        $categories = Cache::remember('programme_categories', 600, function () {
            return HITCCCategory::all();
        });

        if ($request->ajax()) {
            return view('partials.hitcc-cards', compact('opportunities'))->render();
        }

        return view('pages.programme.HI-opportunities.index', compact('opportunities', 'categories'));
    }

    public function show(string $category, string $slug): View
    {
        $cacheKey = "programme_{$category}_{$slug}";
        $programme = Cache::remember($cacheKey, 60, function () use ($category, $slug) {
            return HITCCProgramme::whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            })
                ->with(['category', 'internship', 'volunteer', 'scholarship', 'exchange', 'competition'])
                ->where('slug', $slug)
                ->firstOrFail();
        });

        $relatedOpportunities = HITCCProgramme::with('category')
            ->where('id', '!=', $programme->id)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        return view('pages.programme.HI-opportunities.detail-opportunities', compact('programme', 'relatedOpportunities'));
    }
}
