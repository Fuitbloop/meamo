@extends('admin.layouts.app')

@section('title', 'Booking Detail')
@section('header', 'Booking Detail')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">

        <h3 class="text-lg font-semibold mb-4">Customer Information</h3>
        <h3 class="text-lg font-semibold mb-4">Customer Information</h3>
        <p><b>Name:</b> {{ $booking->user->name }}</p>
        <p><b>Email:</b> {{ $booking->user->email }}</p>

        <hr class="my-4">

        <h3 class="text-lg font-semibold mb-4">Booking Details</h3>
        <p><b>Service:</b> {{ $booking->service->name }}</p>
        <p><b>Date:</b> {{ $booking->schedule->event_date->format('d M Y') }}</p>
        <p><b>Queue Slot:</b> {{ $booking->time_slot }}</p>
        <p><b>Schedule Range:</b> {{ $booking->schedule->start_time }} - {{ $booking->schedule->end_time }}</p>

        <hr class="my-4">

        <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
            @csrf
            @method('PATCH')
            <select name="status" class="border px-3 py-2 rounded">
                @foreach(['pending', 'booked', 'completed', 'cancelled'] as $status)
                    <option value="{{ $status }}" {{ $booking->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            <button class="bg-blue-600 text-white px-4 py-2 rounded ml-2">
                Update
            </button>
        </form>

        <div class="mt-4">
            <a href="{{ route('admin.bookings.index') }}" class="bg-gray-300 px-4 py-2 rounded">
                Back
            </a>
        </div>
    </div>
@endsection