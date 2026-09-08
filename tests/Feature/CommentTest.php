<?php

namespace Tests\Feature;

use App\Services\SimpleCaptcha;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class);
    }

    public function test_comment_section_appears_on_homepage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Komentar');
        $response->assertSee('Nama');
        $response->assertSee('Isi Komentar');
        $response->assertSee('Verifikasi');
    }

    public function test_can_submit_comment_with_valid_captcha(): void
    {
        $code = SimpleCaptcha::generate();

        $response = $this->post(route('comments.store'), [
            'name' => 'Test User',
            'content' => 'This is a test comment',
            'captcha' => $code,
            'page_slug' => url('/'),
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('comments', [
            'name' => 'Test User',
            'content' => 'This is a test comment',
        ]);
    }

    public function test_cannot_submit_comment_with_invalid_captcha(): void
    {
        SimpleCaptcha::generate();

        $response = $this->post(route('comments.store'), [
            'name' => 'Test User',
            'content' => 'This is a test comment',
            'captcha' => 'wrong',
            'page_slug' => url('/'),
        ]);

        $response->assertSessionHasErrors('captcha');

        $this->assertDatabaseMissing('comments', [
            'name' => 'Test User',
        ]);
    }

    public function test_cannot_submit_comment_without_name(): void
    {
        $code = SimpleCaptcha::generate();

        $response = $this->post(route('comments.store'), [
            'name' => '',
            'content' => 'This is a test comment',
            'captcha' => $code,
            'page_slug' => url('/'),
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_cannot_submit_comment_without_content(): void
    {
        $code = SimpleCaptcha::generate();

        $response = $this->post(route('comments.store'), [
            'name' => 'Test User',
            'content' => '',
            'captcha' => $code,
            'page_slug' => url('/'),
        ]);

        $response->assertSessionHasErrors('content');
    }
}
