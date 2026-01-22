<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Schedule;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->take(6)->get();
        $services = Service::all();

        return view('user.home', compact('galleries', 'services'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('user.gallery', compact('galleries'));
    }

    public function services()
    {
        $services = Service::all();
        return view('user.services', compact('services'));
    }

    public function schedules()
    {
        $schedules = Schedule::where('status', 'available')
            ->where('event_date', '>=', now())
            ->orderBy('event_date')
            ->get();

        return view('user.schedules', compact('schedules'));
    }

    public function contact()
    {
        return view('user.contact');
    }
}
