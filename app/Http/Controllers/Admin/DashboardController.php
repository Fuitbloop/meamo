<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'booked' => Booking::where('status', 'booked')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
        ];

        $recent_bookings = Booking::with(['user', 'service', 'schedule'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_bookings'));
    }
}
