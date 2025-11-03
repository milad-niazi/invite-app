<?php

namespace App\Factories;

use App\Models\InvitationLink;
use Illuminate\Support\Str;

class InvitationFactory
{
    public static function create(array $attributes = []): InvitationLink
    {
        $default = [
            'link_address' => Str::uuid(),
            'status' => 1, // پیش‌فرض فعال
        ];

        $data = array_merge($default, $attributes);

        return InvitationLink::create($data);
    }
}
