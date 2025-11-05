@extends('layouts.app')

@section('title', 'All Ceremonies')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">All Ceremonies</h1>

        <div class="mb-4">
            <a href="{{ route('ceremony.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Create New Ceremony
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-2 px-4 text-left">Title</th>
                        <th class="py-2 px-4 text-left">Date & Time</th>
                        <th class="py-2 px-4 text-left">Location</th>
                        <th class="py-2 px-4 text-left">Status</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ceremonies as $ceremony)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $ceremony->title }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($ceremony->date)->format('Y-m-d H:i') }}</td>
                            <td class="py-2 px-4">{{ $ceremony->location }}</td>
                            <td class="py-2 px-4">
                                @if ($ceremony->status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td class="py-2 px-4 flex space-x-2">
                                <a href="{{ route('ceremony.edit', $ceremony->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    Edit
                                </a>

                                <form action="{{ route('ceremony.destroy', $ceremony->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this ceremony?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- اگر pagination استفاده کردی --}}
        {{-- {{ $ceremonies->links() }} --}}
    </div>
@endsection
