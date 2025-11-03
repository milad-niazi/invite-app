<?php

namespace App\Repositories;

use App\Models\Ceremony;

class CeremonyRepository
{
    public function create(array $data): Ceremony
    {
        return Ceremony::create($data);
    }

    public function all()
    {
        return Ceremony::all();
    }

    public function findById(int $id): ?Ceremony
    {
        return Ceremony::find($id);
    }
}
