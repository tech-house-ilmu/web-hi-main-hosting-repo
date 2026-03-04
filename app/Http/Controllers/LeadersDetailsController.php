<?php

namespace App\Http\Controllers;

use App\Models\LeadersDetailsAbout;
use Illuminate\Http\Request;

class LeadersDetailsController extends Controller
{
    public function LeadersDetails()
    {
        $LeadersDetailsAbout = LeadersDetailsAbout::latest()->get();
        return view('pages.about-us.about', compact('LeadersDetailsAbout'));

        $leaders = LeadersDetailsAbout::latest()->get();
    return view('pages.about-us.about', compact('leaders'));
    }
}
