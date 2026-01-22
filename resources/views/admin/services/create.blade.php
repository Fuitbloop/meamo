@extends('admin.layouts.app')

@section('title', 'Add Service')
@section('header', 'Add New Service')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Service Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4"
                      class="w-full px-3 py-2 border rounded @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Price</label>
            <input type="number" name="price" value="{{ old('price') }}"
                   class="w-full px-3 py-2 border rounded @error('price') border-red-500 @enderror" required>
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Save
            </button>
            <a href="{{ route('admin.services.index') }}"
               class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
