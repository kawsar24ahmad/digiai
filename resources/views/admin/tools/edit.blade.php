@extends('admin.layouts.app')

@section('content')
<div class="container max-w-xl mx-auto p-4">
  <h1 class="text-2xl font-semibold mb-6">Edit Tool</h1>

  <form action="{{ route('admin.tools.update', $tool) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1" for="name">Name</label>
      <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $tool->name) }}"
        class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
      >
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1" for="slug">Slug</label>
      <input
        type="text"
        name="slug"
        id="slug"
        value="{{ old('slug', $tool->slug) }}"
        class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
      >
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1" for="type">Type</label>
      <select
        name="type"
        id="type"
        class="block w-full rounded-md border border-gray-300 px-3 py-2 bg-white focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
      >
        @foreach (App\Models\Tool::TYPES as $type)
          <option value="{{ $type }}" {{ old('type', $tool->type) === $type ? 'selected' : '' }}>
            {{ ucfirst(str_replace('_', ' ', $type)) }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1" for="feature">Feature</label>
      <textarea
        name="feature"
        id="feature"
        rows="4"
        class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
      >{{ old('feature', $tool->feature) }}</textarea>
    </div>


    <div>
  <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Current Image</label>
  @if ($tool->image)
    <img src="{{ asset($tool->image) }}" alt="{{ $tool->name }}" class="w-32 h-32 object-cover rounded-md mb-4 border border-gray-300">
  @else
    <p class="text-gray-500 dark:text-gray-400 mb-4">No image uploaded yet.</p>
  @endif

  <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Change Image</label>
  <input
    type="file"
    name="image"
    accept="image/*"
    class="w-full text-gray-900 dark:text-gray-100"
  >
  @error('image')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>


    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1" for="is_active">Status</label>
      <select
        name="is_active"
        id="is_active"
        class="block w-full rounded-md border border-gray-300 px-3 py-2 bg-white focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
      >
        <option value="1" {{ old('is_active', $tool->is_active) ? 'selected' : '' }}>Active</option>
        <option value="0" {{ !old('is_active', $tool->is_active) ? 'selected' : '' }}>Inactive</option>
      </select>
    </div>

    <button
      type="submit"
      class="inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400"
    >
      Update Tool
    </button>
  </form>
</div>
@endsection
