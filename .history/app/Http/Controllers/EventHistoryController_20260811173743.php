<?php

namespace App\Http\Controllers;

use App\Models\EventHistory;
use Illuminate\Http\Request;

class EventHistoryController extends Controller
{
    public function index()
    {
        $historyItems = EventHistory::latest()->get();

        return view('pages.event-history.index', compact('historyItems'));
    }

    public function show($slug)
    {
        $history = EventHistory::where('slug', $slug)->firstOrFail();

        return view('pages.event-history.detail', compact('history'));
    }
}
