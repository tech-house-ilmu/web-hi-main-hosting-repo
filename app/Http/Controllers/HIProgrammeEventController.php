<?php

namespace App\Http\Controllers;

use App\Repositories\HIProgrammeRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HIProgrammeEventController extends Controller
{
    /**
     * Show HI Programmes main listing page.
     */
    public function index(): View
    {
        $heroItems = HIProgrammeRepository::getHeroItems();
        $onlinePrograms = HIProgrammeRepository::getOnlineProgrammes();
        $offlinePrograms = HIProgrammeRepository::getOfflineProgrammes();
        $upcomingEvents = HIProgrammeRepository::getUpcomingEvents();

        return view('pages.programme.HI-programmes.index', compact(
            'heroItems',
            'onlinePrograms',
            'offlinePrograms',
            'upcomingEvents'
        ));
    }

    /**
     * Show the registration / detail page for an upcoming event.
     */
    public function show(Request $request, ?string $slug = null): View
    {
        $target = $slug ?: $request->query('event') ?: 'webskill';
        $cleanSlug = str_replace(['event-', '_'], ['', '-'], strtolower($target));

        $events = HIProgrammeRepository::getUpcomingEvents();
        $event = collect($events)->firstWhere('slug', $cleanSlug)
            ?? collect($events)->firstWhere('id', $target)
            ?? $events[0];

        // Ensure defaults for detail page
        $event['event_type'] = $event['event_type'] ?? 'EVENT GRATIS';
        $event['registration_badge'] = $event['registration_badge'] ?? 'Pendaftaran di Website';
        $event['date'] = $event['date'] ?? 'Tanggal akan diumumkan';
        $event['location'] = $event['location'] ?? (str_contains(strtolower($event['desc'] ?? ''), 'offline') ? 'Luring' : 'Daring');
        $event['price'] = $event['price'] ?? 'Gratis';
        $event['form_url'] = $event['form_url'] ?? 'https://forms.gle/houseilmu';

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
