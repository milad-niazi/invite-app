@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

        {{-- آمار کلی --}}
        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="bg-blue-100 p-4 rounded shadow">
                <h2 class="text-lg font-semibold text-blue-800">Total Ceremonies</h2>
                <p class="text-2xl font-bold">{{ count($ceremonies) }}</p>
            </div>
            <div class="bg-green-100 p-4 rounded shadow">
                <h2 class="text-lg font-semibold text-green-800">Total Invitations</h2>
                <p class="text-2xl font-bold">{{ count($invitations) }}</p>
            </div>
        </div>

        {{-- جدول مراسم‌ها --}}
        <div class="mb-10 bg-white rounded-xl shadow p-4">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-2xl font-semibold">Recent Ceremonies</h2>
                <a href="{{ route('ceremony.index') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Go to Ceremonies
                </a>
            </div>

            <table class="w-full border rounded">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-2 border">Title</th>
                        <th class="p-2 border">Date</th>
                        <th class="p-2 border">Location</th>
                        <th class="p-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ceremonies as $ceremony)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border">{{ $ceremony->title }}</td>
                            <td class="p-2 border">{{ \Carbon\Carbon::parse($ceremony->date)->format('Y-m-d H:i') }}</td>
                            <td class="p-2 border">{{ $ceremony->location }}</td>
                            <td class="p-2 border">
                                {{ $ceremony->status ? 'Active' : 'Inactive' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-3">No ceremonies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- جدول دعوت‌نامه‌ها --}}
        <div class="bg-white rounded-xl shadow p-4">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-2xl font-semibold">Recent Invitations</h2>
                <a href="{{ route('invitation.index') }}"
                   class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                    Go to Invitations
                </a>
            </div>

            <table class="w-full border rounded">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-2 border">Link</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Ceremony</th>
                        <th class="p-2 border">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invitations as $invite)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border">{{ $invite->link_address }}</td>
                            <td class="p-2 border">{{ $invite->status ? 'Active' : 'Inactive' }}</td>
                            <td class="p-2 border">{{ $invite->ceremony->title ?? 'N/A' }}</td>
                            <td class="p-2 border">{{ $invite->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-3">No invitations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
