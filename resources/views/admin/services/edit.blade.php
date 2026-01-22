@extends('admin.layouts.app')

@section('title', 'Edit Service')
@section('header', 'Edit Service')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <form action="{{ route('admin.services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Service Name</label>
            <input type="text" name="name"
                   value="{{ old('name', $service->name) }}"
                   class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4"
                      class="w-full px-3 py-2 border rounded">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Price</label>
            <input type="number" name="price"
                   value="{{ old('price', $service->price) }}"
                   class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Update
            </button>
            <a href="{{ route('admin.services.index') }}"
               class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
