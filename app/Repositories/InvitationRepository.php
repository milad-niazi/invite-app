<?php

namespace App\Repositories;

use App\Models\InvitationLink;

class InvitationRepository
{
    protected $model;

    public function __construct(InvitationLink $model)
    {
        $this->model = $model;
    }

    // ایجاد یک لینک جدید
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // پیدا کردن لینک بر اساس uuid یا slug
    public function findByLinkAddress(string $linkAddress)
    {
        return $this->model->where('link_address', $linkAddress)->first();
    }

    // گرفتن همه لینک‌های یک کاربر
    public function getAllForUser(int $userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }
}
