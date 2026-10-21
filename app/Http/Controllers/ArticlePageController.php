<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticlePageController extends Controller
{
    /**
     * Display the articles landing page.
     */
    public function index(): View
    {
        $featuredArticle = Article::orderBy('date', 'desc')->first();
        $articles = Article::orderBy('date', 'desc')->paginate(9);

        return view('pages.article.index', compact('articles', 'featuredArticle'));
    }

    /**
     * Display a specific article by its slug.
     */
    public function show(string $slug): View
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('pages.article.detail-article', compact('article'));
    }
}
