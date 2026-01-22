@extends('user.layouts.app')

@section('title', 'Schedules')

@section('content')
<section class="py-16 max-w-7xl mx-auto px-4">
    <h1 class="text-4xl font-bold text-center mb-12">Available Schedules</h1>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4">Time</th>
                    <th class="px-6 py-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules as $schedule)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $schedule->event_date->format('d F Y') }}</td>
                    <td class="px-6 py-4">{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('booking.create') }}"
                           class="text-blue-600 hover:underline">
                            Book
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-8 text-gray-500">
                        No schedules available
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
