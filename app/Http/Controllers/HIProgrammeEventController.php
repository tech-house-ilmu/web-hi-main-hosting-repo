<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HIProgrammeEventController extends Controller
{
    /**
     * All upcoming events for House Ilmu programmes.
     */
    protected array $events = [
        'webskill' => [
            'id' => 'event-webskill',
            'slug' => 'webskill',
            'badge' => 'Webskill',
            'title' => 'Webskill: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'date_info' => 'Tanggal akan diumumkan · Daring',
            'date' => 'Tanggal akan diumumkan',
            'location' => 'Daring',
            'price_label' => 'Gratis',
            'price' => 'Gratis',
            'event_type' => 'EVENT GRATIS',
            'registration_badge' => 'Pendaftaran Google Form',
            'form_url' => 'https://forms.gle/houseilmu',
            'image' => 'img/programmes/poster-webskill.webp',
            'desc' => 'Webinar interaktif bersama para praktisi dan mentor industri untuk membekali kamu dengan skill praktis dan wawasan karir terkini.',
        ],
        'workskill' => [
            'id' => 'event-workskill',
            'slug' => 'workskill',
            'badge' => 'Workskill',
            'title' => 'Workskill: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'date_info' => 'Tanggal akan diumumkan · Daring',
            'date' => 'Tanggal akan diumumkan',
            'location' => 'Daring',
            'price_label' => 'Gratis',
            'price' => 'Gratis',
            'event_type' => 'EVENT GRATIS',
            'registration_badge' => 'Pendaftaran Google Form',
            'form_url' => 'https://forms.gle/houseilmu',
            'image' => 'img/programmes/poster-workskill.webp',
            'desc' => 'Workshop praktis untuk belajar skill secara hands-on dan menghasilkan karya portofolio.',
        ],
        'opportunity-corners' => [
            'id' => 'event-opportunity',
            'slug' => 'opportunity-corners',
            'badge' => 'Opportunity Corners',
            'title' => 'Opportunity Corners: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'date_info' => 'Tanggal akan diumumkan · Daring',
            'date' => 'Tanggal akan diumumkan',
            'location' => 'Daring',
            'price_label' => 'Gratis',
            'price' => 'Gratis',
            'event_type' => 'EVENT GRATIS',
            'registration_badge' => 'Pendaftaran Google Form',
            'form_url' => 'https://forms.gle/houseilmu',
            'image' => 'img/programmes/poster-opportunity.webp',
            'desc' => 'Sesi sharing mengenai berbagai opportunity untuk mahasiswa seperti internship, scholarship, dan program pengembangan lainnya.',
        ],
        'sudut-karir' => [
            'id' => 'event-sudutkarir',
            'slug' => 'sudut-karir',
            'badge' => 'Sudut Karir',
            'title' => 'Sudut Karir: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'date_info' => 'Tanggal akan diumumkan · Luring',
            'date' => 'Tanggal akan diumumkan',
            'location' => 'Luring',
            'price_label' => 'Gratis',
            'price' => 'Gratis',
            'event_type' => 'EVENT GRATIS',
            'registration_badge' => 'Pendaftaran Google Form',
            'form_url' => 'https://forms.gle/houseilmu',
            'image' => 'img/programmes/poster-sudut-karir.webp',
            'desc' => 'Sesi coaching karir offline dengan simulasi interview, personal branding makeover, serta review CV langsung bersama HR profesional.',
        ],
        'chill-ups' => [
            'id' => 'event-chillups',
            'slug' => 'chill-ups',
            'badge' => 'Chill-Ups',
            'title' => 'Chill-Ups: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'date_info' => 'Tanggal akan diumumkan · Luring',
            'date' => 'Tanggal akan diumumkan',
            'location' => 'Luring',
            'price_label' => 'Gratis',
            'price' => 'Gratis',
            'event_type' => 'EVENT GRATIS',
            'registration_badge' => 'Pendaftaran Google Form',
            'form_url' => 'https://forms.gle/houseilmu',
            'image' => 'img/programmes/poster-chill-ups.webp',
            'desc' => 'Sesi ngobrol santai bersama profesional dengan sistem open question.',
        ],
        'main-ke-kantor' => [
            'id' => 'event-mainkekantor',
            'slug' => 'main-ke-kantor',
            'badge' => '#MainkeKantor',
            'title' => '#MainkeKantor: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'date_info' => 'Tanggal akan diumumkan · Luring',
            'date' => 'Tanggal akan diumumkan',
            'location' => 'Luring',
            'price_label' => 'Gratis',
            'price' => 'Gratis',
            'event_type' => 'EVENT GRATIS',
            'registration_badge' => 'Pendaftaran Google Form',
            'form_url' => 'https://forms.gle/houseilmu',
            'image' => 'img/programmes/poster-main-ke-kantor.webp',
            'desc' => 'Program company visit untuk melihat langsung budaya kerja, lingkungan kerja, dan sistem kerja di dunia profesional.',
        ],
    ];

    /**
     * Show the registration / detail page for an upcoming event.
     */
    public function show(?string $slug = 'webskill'): View
    {
        $cleanSlug = str_replace(['event-', '_'], ['', '-'], strtolower($slug ?: 'webskill'));

        $event = $this->events[$cleanSlug]
            ?? collect($this->events)->firstWhere('slug', $cleanSlug)
            ?? collect($this->events)->firstWhere('id', $slug)
            ?? $this->events['webskill'];

        return view('pages.programme.HI-programmes.detail', compact('event'));
    }

    /**
     * Handle event registration form submission.
     */
    public function register(Request $request, ?string $slug = 'webskill')
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:30',
        ]);

        return back()->with('success', 'Pendaftaran berhasil disimpan! Tim House Ilmu akan segera menghubungimu melalui WhatsApp.');
    }
}
