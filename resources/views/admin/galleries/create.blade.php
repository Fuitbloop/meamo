@extends('admin.layouts.app')

@section('title', 'Upload Photo')
@section('header', 'Upload New Photo')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <form action="{{ route('admin.galleries.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Photo</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full px-3 py-2 border rounded" required>
            <p class="text-gray-500 text-sm mt-1">
                Max size: 2MB. Format: JPG, PNG
            </p>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Caption (Optional)</label>
            <input type="text" name="caption"
                   value="{{ old('caption') }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="flex gap-2">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Upload
            </button>
            <a href="{{ route('admin.galleries.index') }}"
               class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
