@extends('admin.layouts.app')

@section('title', 'Add Schedule')
@section('header', 'Add New Schedule')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <form action="{{ route('admin.schedules.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Event Date</label>
            <input type="date" name="event_date" value="{{ old('event_date') }}"
                   class="w-full px-3 py-2 border rounded @error('event_date') border-red-500 @enderror" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Start Time</label>
            <input type="time" name="start_time" value="{{ old('start_time') }}"
                   class="w-full px-3 py-2 border rounded @error('start_time') border-red-500 @enderror" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">End Time</label>
            <input type="time" name="end_time" value="{{ old('end_time') }}"
                   class="w-full px-3 py-2 border rounded @error('end_time') border-red-500 @enderror" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Status</label>
            <select name="status" class="w-full px-3 py-2 border rounded" required>
                <option value="available">Available</option>
                <option value="booked">Booked</option>
                <option value="unavailable">Unavailable</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Save
            </button>
            <a href="{{ route('admin.schedules.index') }}"
               class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
