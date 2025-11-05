@extends('layouts.app')

@section('title', 'Create New Ceremony')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow mt-8">
        <h1 class="text-2xl font-bold mb-6">Create New Ceremony</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ceremony.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-medium mb-1">Ceremony Title</label>
                <input type="text" name="title" id="title" class="w-full border rounded p-2"
                    value="{{ old('title') }}" required>
            </div>

            <div class="mb-4">
                <label for="date" class="block font-medium mb-1">Date & Time</label>
                <input type="datetime-local" name="date" id="date" class="w-full border rounded p-2"
                    value="{{ old('date') }}" required>
            </div>

            <div class="mb-4">
                <label for="location" class="block font-medium mb-1">Location</label>
                <input type="text" name="location" id="location" class="w-full border rounded p-2"
                    value="{{ old('location') }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium mb-1">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block font-medium mb-1">Ceremony Status</label>
                <select name="status" id="status" class="w-full border rounded p-2">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Ceremony
            </button>
        </form>
    </div>
@endsection
