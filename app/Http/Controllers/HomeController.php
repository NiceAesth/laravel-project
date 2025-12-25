<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('event_date', '>=', now())
            ->orderBy('event_date')
            ->limit(5)
            ->get();

        $recentMembers = Member::latest()->limit(5)->get();

        $recentStories = SuccessStory::with('member')
            ->latest()
            ->limit(5)
            ->get();

        return view('home', compact('upcomingEvents', 'recentMembers', 'recentStories'));
    }
}
