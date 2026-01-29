@extends('user.layouts.app')

@section('title', 'Book Now')

@section('content')
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4">

            <h1 class="text-4xl font-bold text-center mb-8">
                Book Your Photo Booth
            </h1>

            <div class="bg-white rounded-lg shadow-lg p-8">
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <!-- Name and Email are auto-filled from Logged In User -->

                    <div class="mb-6">
                        <label>Service *</label>
                        <select name="service_id" class="w-full border rounded-lg px-4 py-3" required>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label>Schedule *</label>
                        <select name="schedule_id" class="w-full border rounded-lg px-4 py-3" required>
                            @foreach($schedules as $schedule)
                                @php $isAvailable = $schedule->isAvailable(); @endphp
                                <option value="{{ $schedule->id }}" {{ !$isAvailable ? 'disabled' : '' }} class="{{ !$isAvailable ? 'text-gray-400 bg-gray-100' : '' }}">
                                    {{ $schedule->event_date->format('d F Y') }} ({{ $schedule->next_slot }}) {{ !$isAvailable ? '(Full)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label>Notes</label>
                        <textarea name="notes" class="w-full border rounded-lg px-4 py-3"></textarea>
                    </div>

                    <button class="w-full bg-blue-600 text-white py-3 rounded-lg">
                        Submit Booking
                    </button>
                </form>
            </div>

        </div>
    </section>
@endsection