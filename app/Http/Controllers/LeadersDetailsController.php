<?php

namespace App\Http\Controllers;

use App\Models\LeadersDetailsAbout;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadersDetailsController extends Controller
{
    /**
     * Display the About Us page with leadership details.
     */
    public function index(): View
    {
        $leaders = LeadersDetailsAbout::orderBy('order', 'asc')->get();

        return view('pages.about-us.about', [
            'leaders' => $leaders,
            'LeadersDetailsAbout' => $leaders,
        ]);
    }

    /**
     * Return employees as JSON.
     */
    public function api(Request $request): JsonResponse
    {
        $query = LeadersDetailsAbout::orderBy('order', 'asc');

        if ($request->filled('division')) {
            $query->where('leaders_details_position_division', $request->division);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('leaders_details_name', 'like', "%{$search}%")
                  ->orWhere('leaders_details_position', 'like', "%{$search}%")
                  ->orWhere('leaders_details_sub_division', 'like', "%{$search}%")
                  ->orWhere('leaders_details_position_division', 'like', "%{$search}%");
            });
        }

        $employees = $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->leaders_details_name,
                'position' => $item->leaders_details_position,
                'division' => $item->leaders_details_position_division,
                'sub_division' => $item->leaders_details_sub_division,
                'email' => $item->leaders_details_email,
                'linkedin' => $item->leaders_details_linkedin,
                'img' => $item->leaders_details_img ? asset('storage/' . $item->leaders_details_img) : null,
                'order' => $item->order,
            ];
        });

        return response()->json($employees);
    }

    /**
     * Backward-compatible alias for previous method name.
     */
    public function LeadersDetails(): View
    {
        return $this->index();
    }
}
