<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {

        $events = Event::where('is_active', true)->latest()->get();

        // return view('pages.index', ['events' => $events]);
    }
}
