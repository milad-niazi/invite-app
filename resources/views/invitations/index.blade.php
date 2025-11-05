@extends('layouts.app')

@section('title', 'My Invitations')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">My Invitations</h1>

        <div class="mb-4">
            <a href="{{ route('invitation.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Create New Invitation
            </a>
        </div>

        @if ($invitations->isEmpty())
            <p class="text-gray-600">You have no invitations yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-4 text-left">Link Address</th>
                            <th class="py-2 px-4 text-left">Ceremony</th>
                            <th class="py-2 px-4 text-left">Status</th>
                            <th class="py-2 px-4 text-left">Created At</th>
                            <th class="py-2 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invitations as $invitation)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 px-4">{{ $invitation->link_address }}</td>
                                <td class="py-2 px-4">
                                    {{ $invitation->ceremony->title ?? 'No Ceremony' }}
                                </td>
                                <td class="py-2 px-4">
                                    @if ($invitation->status == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td class="py-2 px-4">
                                    {{ \Carbon\Carbon::parse($invitation->created_at)->format('Y-m-d H:i') }}
                                </td>
                                <td class="py-2 px-4 flex space-x-2">
                                    <a href="{{ route('invitation.show', $invitation->link_address) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        View
                                    </a>

                                    <form action="{{ route('invitation.destroy', $invitation->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this invitation?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
