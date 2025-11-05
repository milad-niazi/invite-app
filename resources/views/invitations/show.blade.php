@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Invitation Details</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <p><strong>Invitation Link:</strong> {{ $invitation->link_address }}</p>
            <p><strong>Status:</strong>
                @if ($invitation->status === 1)
                    Active
                @else
                    Inactive
                @endif
            </p>

            <h2 class="text-xl font-semibold mt-4 mb-2">Ceremony Information</h2>
            @if ($invitation->ceremony)
                <p><strong>Ceremony Title:</strong> {{ $invitation->ceremony->title }}</p>
                <p><strong>Description:</strong> {{ $invitation->ceremony->description ?? 'No description' }}</p>
                <p><strong>Date:</strong>
                    {{ $invitation->ceremony->date ? \Carbon\Carbon::parse($invitation->ceremony->date)->format('Y-m-d H:i') : 'Unknown' }}
                </p>
            @else
                <p>Ceremony information not available.</p>
            @endif
        </div>
    </div>
@endsection
