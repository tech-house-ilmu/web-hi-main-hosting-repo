<?php

namespace Tests\Feature;

use Tests\TestCase;

class EventHistoryTest extends TestCase
{
    public function test_event_history_shows_only_the_gb_circle_meetup_entry(): void
    {
        $this->get(route('event-history.index'))
            ->assertOk()
            ->assertSee('Write to Earn: Rahasia Bikin Artikel Menarik yang Bisa Jadi Side Hustle')
            ->assertSee('Stories from Every Event')
            ->assertSee('Webskill')
            ->assertSee('Workskill')
            ->assertSee('Opportunity Corners')
            ->assertSee('Sudut Karir')
            ->assertSee('Chill-Ups')
            ->assertSee('#MainkeKantor')
            ->assertSee('Event Collaboration')
            ->assertSee('gb-circle-meetup-poster.png')
            ->assertDontSee('HI-FEST');
    }

    public function test_gb_circle_meetup_detail_shows_event_copy_and_gallery_image(): void
    {
        $this->get(route('event-history.show', 'write-to-earn-gb-circle-meetup'))
            ->assertOk()
            ->assertSee('GB Circle Meetup merupakan kegiatan kolaborasi bersama House Ilmu Indonesia')
            ->assertSee('Kak Alivia Ariatna')
            ->assertSee('SEO Content Writer di cmlabs')
            ->assertSee('Jumat, 14 Agustus 2026')
            ->assertSee('Membantu peserta memahami cara membangun portofolio menulis dari nol.')
            ->assertSee('Rangkaian Kegiatan')
            ->assertSee('Hasil dan Manfaat Kegiatan')
            ->assertSee('Galeri Kegiatan')
            ->assertSee('gb-circle-meetup-poster.png')
            ->assertSee('gb-circle-meetup-session.png');
    }

    public function test_unknown_event_history_slug_returns_not_found(): void
    {
        $this->get(route('event-history.show', 'unknown-event'))
            ->assertNotFound();
    }
}
