@extends('admin.layouts.app')

@section('title', 'Bookings')
@section('header', 'Manage Bookings')

@section('content')
<div class="mb-4">
    <form method="GET" class="flex gap-2">
        <select name="status" class="px-3 py-2 border rounded">
            <option value="">All Status</option>
            @foreach(['pending','booked','completed','cancelled'] as $status)
                <option value="{{ $status }}"
                    {{ request('status') === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Filter
        </button>
    </form>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3">Customer</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Service</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($bookings as $booking)
            <tr>
                <td class="px-6 py-4">{{ $booking->customer_name }}</td>
                <td class="px-6 py-4">{{ $booking->customer_email }}</td>
                <td class="px-6 py-4">{{ $booking->service->name }}</td>
                <td class="px-6 py-4">
                    {{ $booking->schedule->event_date->format('d M Y') }}
                </td>
                <td class="px-6 py-4">{{ ucfirst($booking->status) }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.bookings.show', $booking) }}"
                       class="text-blue-600 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $bookings->links() }}
</div>
@endsection
