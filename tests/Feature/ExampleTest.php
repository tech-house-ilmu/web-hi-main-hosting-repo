<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_returns_successful_response(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    public function test_about_page_returns_successful_response(): void
    {
        $response = $this->get(route('about'));
        $response->assertStatus(200);
    }

    public function test_career_page_returns_successful_response(): void
    {
        $response = $this->get(route('career.index'));
        $response->assertStatus(200);
    }

    public function test_partnership_page_returns_successful_response(): void
    {
        $response = $this->get(route('partnership.index'));
        $response->assertStatus(200);
    }

    public function test_programme_pages_return_successful_response(): void
    {
        $response = $this->get(route('programme.programmes'));
        $response->assertStatus(200);

        $responseOpp = $this->get(route('programme.hi.index'));
        $responseOpp->assertStatus(200);
    }

    public function test_article_page_returns_successful_response(): void
    {
        $response = $this->get(route('article.index'));
        $response->assertStatus(200);
    }

    public function test_article_detail_page_returns_200_for_existing_slug(): void
    {
        $article = \App\Models\Article::create([
            'title' => 'Test Artikel SEO',
            'text' => '<p>Konten artikel test</p>',
            'img' => 'articles/test.webp',
            'author' => 'Author Test',
            'date' => now(),
            'slug' => 'test-artikel-seo',
            'category' => 'Skill Development',
        ]);

        $response = $this->get(route('article.show', $article->slug));
        $response->assertStatus(200);
        $response->assertSee('Test Artikel SEO');
    }

    public function test_article_detail_page_returns_404_for_invalid_slug(): void
    {
        $response = $this->get(route('article.show', 'slug-yang-tidak-ada'));
        $response->assertStatus(404);
    }

    public function test_filament_admin_denies_access_to_non_admin_user(): void
    {
        $user = \App\Models\User::create([
            'name' => 'Regular User',
            'email' => 'user@mail.com',
            'password' => 'secret123',
            'is_admin' => false,
        ]);

        $this->actingAs($user);
        $response = $this->get('/admin');
        $response->assertStatus(403);
    }

    public function test_filament_admin_allows_access_to_admin_user(): void
    {
        $admin = \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'superadmin@mail.com',
            'password' => 'secret123',
            'is_admin' => true,
        ]);

        $this->actingAs($admin);
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }
}
