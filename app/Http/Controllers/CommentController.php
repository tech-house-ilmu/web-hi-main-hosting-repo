<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\SimpleCaptcha;
use App\Services\WordFilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $pageSlug = $request->query('page_slug', url()->current());
        $comments = Cache::remember("comments_index_{$pageSlug}", 60, function () use ($pageSlug) {
            return Comment::where('page_slug', $pageSlug)
                ->whereNull('parent_id')
                ->with('replies')
                ->latest()
                ->take(10)
                ->get();
        });
        SimpleCaptcha::generate();

        return view('partials.comments', compact('comments', 'pageSlug'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'content' => 'required|string|max:1000',
            'captcha' => 'required|string',
            'page_slug' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (!SimpleCaptcha::verify($request->captcha)) {
            return back()->withErrors(['captcha' => 'Kode captcha tidak sesuai'])->withInput();
        }

        if (WordFilterService::containsBannedWord($request->name)) {
            return back()->withErrors(['name' => 'Nama mengandung kata yang tidak diperbolehkan.'])->withInput();
        }

        if (WordFilterService::containsBannedWord($request->content)) {
            return back()->withErrors(['content' => 'Komentar mengandung kata yang tidak diperbolehkan.'])->withInput();
        }

        Comment::create([
            'page_slug' => $request->page_slug,
            'name' => $request->name,
            'content' => $request->content,
            'parent_id' => $request->parent_id,
        ]);

        Cache::forget("comments_{$request->page_slug}");
        Cache::forget("comments_index_{$request->page_slug}");

        return back()->with('success', 'Komentar berhasil dikirim!');
    }

    public function captchaImage()
    {
        $svg = SimpleCaptcha::regenerate();

        return response($svg, 200, [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
