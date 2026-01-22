<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Schedule;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        $services = Service::all();
        $schedules = Schedule::where('status', 'available')
            ->where('event_date', '>=', now())
            ->orderBy('event_date')
            ->get();

        return view('user.booking', compact('services', 'schedules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:150',
            'customer_email' => 'required|email|max:150',
            'service_id' => 'required|exists:services,id',
            'schedule_id' => 'required|exists:schedules,id',
            'notes' => 'nullable|string',
        ]);

        $schedule = Schedule::find($validated['schedule_id']);

        if (!$schedule->isAvailable()) {
            return back()->with('error', 'Jadwal yang dipilih sudah tidak tersedia!');
        }

        Booking::create($validated);

        return redirect()->route('home')
            ->with('success', 'Booking berhasil! Kami akan segera menghubungi Anda.');
    }
}
