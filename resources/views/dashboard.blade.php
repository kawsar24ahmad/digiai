@extends('layouts.app')
@section('content')
@php
$tools = App\Models\Tool::all();
@endphp
<h1 class="text-2xl font-bold">All Tools</h1>

            <!-- Tools Grid -->
            <div class="grid grid-cols-1 mt-3 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($tools as $tool )
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl"><img class="w-10 h-10" src="{{ $tool->image }}" alt=""></span>
                        <div class="font-bold text-lg">{{ $tool->name }}</div>
                    </div>
                    <div class="text-sm text-gray-500">{{ $tool->feature }}</div>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Use Now</button>
                </div>
                @endforeach


            </div>

@endsection
