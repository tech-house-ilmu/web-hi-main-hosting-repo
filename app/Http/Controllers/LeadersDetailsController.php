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
     * Mengembalikan data seluruh karyawan dalam bentuk JSON terenkripsi.
     */
    public function api(Request $request): JsonResponse
    {
        $query = LeadersDetailsAbout::orderBy('order', 'asc');

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

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

        return response()->json($this->encryptPayload($employees));
    }

    /**
     * Mengembalikan data satu karyawan berdasarkan ID dalam bentuk JSON terenkripsi.
     */
    public function showApi($id): JsonResponse
    {
        $item = LeadersDetailsAbout::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Employee not found',
            ], 404);
        }

        return response()->json($this->encryptPayload([
            'id' => $item->id,
            'name' => $item->leaders_details_name,
            'position' => $item->leaders_details_position,
            'division' => $item->leaders_details_position_division,
            'sub_division' => $item->leaders_details_sub_division,
            'email' => $item->leaders_details_email,
            'linkedin' => $item->leaders_details_linkedin,
            'img' => $item->leaders_details_img ? asset('storage/' . $item->leaders_details_img) : null,
            'order' => $item->order,
        ]));
    }

    /**
     * Enkripsi payload response menggunakan AES-256-CBC.
     */
    protected function encryptPayload(mixed $data): array
    {
        $key = hash('sha256', config('app.key'), true);
        $iv = openssl_random_pseudo_bytes(16);
        $encrypted = openssl_encrypt(json_encode($data), 'AES-256-CBC', $key, 0, $iv);

        return [
            'encrypted' => true,
            'data' => $encrypted,
            'iv' => base64_encode($iv),
        ];
    }

    /**
     * Backward-compatible alias for previous method name.
     */
    public function LeadersDetails(): View
    {
        return $this->index();
    }
}
