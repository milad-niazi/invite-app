<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ceremony extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'date',
        'location',
        'description',
        'status',
    ];
    public function invitations()
    {
        return $this->hasMany(InvitationLink::class);
    }
}
