<?php

namespace App\Factories;

use App\Models\Ceremony;
use Illuminate\Support\Str;

class CeremonyFactory
{
    public static function create(array $attributes = []): Ceremony
    {
        $default = [
            'title' => 'مراسم جدید',
            'slug' => Str::uuid(),
            'date' => now(),
            'location' => 'نامشخص',
            'description' => '',
            'status' => 1, // فعال به صورت پیشفرض
        ];

        $data = array_merge($default, $attributes);

        return Ceremony::create($data);
    }
}
