<?php

namespace App\Http\Controllers;

use App\Models\HITCCCategory;
use App\Models\HITCCProgramme;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HITCCProgrammeController extends Controller
{
    /**
     * Fallback mock opportunities matching 1:1 Figma prototype when DB is unavailable or empty.
     */
    protected function getFallbackOpportunities(): array
    {
        return [
            [
                'id' => 1,
                'title_program' => 'Marketing Internship',
                'slug' => 'marketing-internship',
                'company_name' => 'House Ilmu Indonesia',
                'company_desc' => 'Kesempatan belajar mengelola kampanye edukasi dan komunikasi digital bersama tim House Ilmu Indonesia.',
                'registration_info' => 'Kesempatan belajar mengelola kampanye edukasi dan komunikasi digital bersama tim House Ilmu Indonesia.',
                'category_slug' => 'internship',
                'category_name' => 'Magang',
                'bg_poster_img' => null,
            ],
            [
                'id' => 2,
                'title_program' => 'HI Programme Volunteer',
                'slug' => 'hi-programme-volunteer',
                'company_name' => 'House Ilmu Indonesia',
                'company_desc' => 'Ruang kontribusi bagi anak muda untuk mendukung persiapan dan pelaksanaan program edukatif.',
                'registration_info' => 'Ruang kontribusi bagi anak muda untuk mendukung persiapan dan pelaksanaan program edukatif.',
                'category_slug' => 'volunteer',
                'category_name' => 'Relawan',
                'bg_poster_img' => null,
            ],
            [
                'id' => 3,
                'title_program' => 'Future Leaders Scholarship',
                'slug' => 'future-leaders-scholarship',
                'company_name' => 'House Ilmu Indonesia',
                'company_desc' => 'Kurasi peluang beasiswa untuk mendukung pendidikan dan pengembangan kepemimpinan generasi muda.',
                'registration_info' => 'Kurasi peluang beasiswa untuk mendukung pendidikan dan pengembangan kepemimpinan generasi muda.',
                'category_slug' => 'scholarship',
                'category_name' => 'Beasiswa',
                'bg_poster_img' => null,
            ],
            [
                'id' => 4,
                'title_program' => 'Student Exchange Programme',
                'slug' => 'student-exchange-programme',
                'company_name' => 'House Ilmu Indonesia',
                'company_desc' => 'Program pertukaran pelajar untuk memperluas perspektif global dan jejaring internasional.',
                'registration_info' => 'Program pertukaran pelajar untuk memperluas perspektif global dan jejaring internasional.',
                'category_slug' => 'exchange',
                'category_name' => 'Pertukaran',
                'bg_poster_img' => null,
            ],
            [
                'id' => 5,
                'title_program' => 'Youth Innovation Competition',
                'slug' => 'youth-innovation-competition',
                'company_name' => 'House Ilmu Indonesia',
                'company_desc' => 'Kompetisi ide berdampak yang mengajak anak muda menjawab tantangan sosial dan teknologi.',
                'registration_info' => 'Kompetisi ide berdampak yang mengajak anak muda menjawab tantangan sosial dan teknologi.',
                'category_slug' => 'competition',
                'category_name' => 'Kompetisi',
                'bg_poster_img' => null,
            ],
        ];
    }

    public function index(Request $request): View|string
    {
        $category = $request->get('category');
        $search = $request->get('search');
        $sort = $request->get('sort', 'deadline_asc');

        try {
            $hasDbRecords = HITCCProgramme::exists();

            if (!$hasDbRecords) {
                // If DB has 0 records (dev/staging), use dynamic fallback paginator
                $opportunities = $this->buildFallbackPaginator($request, $category, $search);
                $categories = collect([
                    (object) ['slug' => 'internship', 'name' => 'Magang'],
                    (object) ['slug' => 'volunteer', 'name' => 'Relawan'],
                    (object) ['slug' => 'scholarship', 'name' => 'Beasiswa'],
                    (object) ['slug' => 'exchange', 'name' => 'Pertukaran'],
                    (object) ['slug' => 'competition', 'name' => 'Kompetisi'],
                ]);
            } else {
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
            }
        } catch (\Throwable $e) {
            // Graceful offline fallback
            $opportunities = $this->buildFallbackPaginator($request, $category, $search);
            $categories = collect([
                (object) ['slug' => 'internship', 'name' => 'Magang'],
                (object) ['slug' => 'volunteer', 'name' => 'Relawan'],
                (object) ['slug' => 'scholarship', 'name' => 'Beasiswa'],
                (object) ['slug' => 'exchange', 'name' => 'Pertukaran'],
                (object) ['slug' => 'competition', 'name' => 'Kompetisi'],
            ]);
        }

        if ($request->ajax()) {
            return view('partials.hitcc-cards', compact('opportunities'))->render();
        }

        return view('pages.programme.HI-opportunities.index', compact('opportunities', 'categories'));
    }

    protected function buildFallbackPaginator(Request $request, ?string $category, ?string $search): LengthAwarePaginator
    {
        $items = collect($this->getFallbackOpportunities())->map(function ($item) {
            $obj = (object) $item;
            $obj->category = (object) [
                'slug' => $item['category_slug'],
                'name' => $item['category_name'],
            ];
            return $obj;
        });

        if ($category && $category !== 'all') {
            $items = $items->filter(function ($item) use ($category) {
                return strtolower($item->category->slug) === strtolower($category);
            });
        }

        if ($search) {
            $searchLower = strtolower(trim($search));
            $items = $items->filter(function ($item) use ($searchLower) {
                return str_contains(strtolower($item->title_program), $searchLower) ||
                    str_contains(strtolower($item->company_desc ?? ''), $searchLower) ||
                    str_contains(strtolower($item->company_name ?? ''), $searchLower) ||
                    str_contains(strtolower($item->registration_info ?? ''), $searchLower) ||
                    str_contains(strtolower($item->category->name ?? ''), $searchLower);
            });
        }

        $page = (int) $request->get('page', 1);
        $perPage = 6;
        $offset = ($page - 1) * $perPage;

        return new LengthAwarePaginator(
            $items->slice($offset, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }

    public function show(string $category, string $slug): View
    {
        try {
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
        } catch (\Throwable $e) {
            $fallback = collect($this->getFallbackOpportunities())->firstWhere('slug', $slug)
                ?? $this->getFallbackOpportunities()[0];

            $programme = (object) $fallback;
            $programme->category = (object) [
                'slug' => $fallback['category_slug'],
                'name' => $fallback['category_name'],
            ];
            $programme->registration_deadline = now()->addDays(14);
            $programme->is_active = true;
            $programme->internship = null;
            $programme->volunteer = null;
            $programme->scholarship = null;
            $programme->exchange = null;
            $programme->competition = null;

            $relatedOpportunities = collect($this->getFallbackOpportunities())
                ->where('slug', '!=', $slug)
                ->take(3)
                ->map(function ($item) {
                    $obj = (object) $item;
                    $obj->category = (object) [
                        'slug' => $item['category_slug'],
                        'name' => $item['category_name'],
                    ];
                    return $obj;
                });
        }

        return view('pages.programme.HI-opportunities.detail-opportunities', compact('programme', 'relatedOpportunities'));
    }
}
