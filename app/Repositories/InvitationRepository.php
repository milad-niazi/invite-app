<?php

namespace App\Repositories;

use App\Models\InvitationLink;
use Illuminate\Support\Str;

class InvitationRepository
{
    public function create(array $data): InvitationLink
    {
        $data['link_address'] = $data['link_address'] ?? Str::uuid();
        return InvitationLink::create($data);
    }

    public function findByLink(string $linkAddress): ?InvitationLink
    {
        return InvitationLink::where('link_address', $linkAddress)->first();
    }

    public function allForUser(int $userId)
    {
        return InvitationLink::where('user_id', $userId)->get();
    }
    public function findById(int $id): ?InvitationLink
    {
        return InvitationLink::find($id);
    }
}
