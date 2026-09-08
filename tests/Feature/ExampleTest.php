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
}
