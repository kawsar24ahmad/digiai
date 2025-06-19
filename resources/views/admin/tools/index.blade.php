@extends('admin.layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Tools</h1>
    <a href="{{ route('admin.tools.create') }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md">
      + Add Tool
    </a>
  </div>

  <div class="overflow-x-auto rounded-lg shadow border dark:border-gray-700">
    <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300">
      <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase font-semibold tracking-wider">
        <tr>
          <th class="px-6 py-3">#</th>
          <th class="px-6 py-3">Name</th>
          <th class="px-6 py-3">Slug</th>
          <th class="px-6 py-3">Image</th> {{-- New image column --}}
          <th class="px-6 py-3">Type</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-right">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
        @forelse ($tools as $tool)
          <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
            <td class="px-6 py-3">{{ $loop->iteration }}</td>
            <td class="px-6 py-3 font-medium">{{ $tool->name }}</td>
            <td class="px-6 py-3">{{ $tool->slug }}</td>
            <td class="px-6 py-3">
              @if($tool->image)
                <img src="{{ asset($tool->image) }}" alt="{{ $tool->name }}" class="w-12 h-12 object-cover rounded-md border border-gray-300">
              @else
                <span class="text-gray-400 italic">No Image</span>
              @endif
            </td>
            <td class="px-6 py-3 capitalize">{{ $tool->type }}</td>
            <td class="px-6 py-3">
              <span class="{{ $tool->is_active ? 'text-green-600' : 'text-red-600' }}">
                {{ $tool->is_active ? '✅ Active' : '❌ Inactive' }}
              </span>
            </td>
            <td class="px-6 py-3 text-right">
              <a href="{{ route('admin.tools.edit', $tool) }}"
                 class="text-blue-600 hover:text-blue-800 font-medium">
                Edit
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
              No tools found.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $tools->links('pagination::tailwind') }}
  </div>
</div>
@endsection
