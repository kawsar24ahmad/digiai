@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-900 rounded-lg shadow">
  <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Add New Tool</h1>

  <form action="{{ route('admin.tools.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
    @csrf

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
      <input type="text" name="name" value="{{ old('name') }}"
             class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
      @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Slug</label>
      <input type="text" name="slug" value="{{ old('slug') }}"
             class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
      @error('slug')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
      <select name="type"
              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach (App\Models\Tool::TYPES as $type)
          <option value="{{ $type }}" {{ old('type') === $type ? 'selected' : '' }}>
            {{ ucfirst(str_replace('_', ' ', $type)) }}
          </option>
        @endforeach
      </select>
      @error('type')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Feature</label>
      <textarea name="feature" rows="4"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">{{ old('feature') }}</textarea>
      @error('feature')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>


    <div>
    <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
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
      <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
      <select name="is_active"
              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
      </select>
      @error('is_active')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="pt-4">
      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition">
        Create Tool
      </button>
    </div>
  </form>
</div>
@endsection
