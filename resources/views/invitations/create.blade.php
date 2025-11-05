@extends('layouts.app')

@section('title', 'Create New Invitation')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow mt-8">
        <h1 class="text-2xl font-bold mb-6">Create New Invitation</h1>

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

        <form action="{{ route('invitation.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="ceremony_id" class="block font-medium mb-1">Ceremony</label>
                <select name="ceremony_id" id="ceremony_id" class="w-full border rounded p-2">
                    @foreach ($ceremonies as $ceremony)
                        <option value="{{ $ceremony->id }}">
                            {{ $ceremony->title }} - {{ \Carbon\Carbon::parse($ceremony->date)->format('Y-m-d H:i') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="block font-medium mb-1">Invitation Status</label>
                <select name="status" id="status" class="w-full border rounded p-2">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Invitation
            </button>
        </form>
    </div>
@endsection
