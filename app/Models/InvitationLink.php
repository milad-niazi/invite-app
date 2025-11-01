<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationLink extends Model
{
    use HasFactory;
    protected $table = 'invitation_links';
    protected $fillable = ['user_id', 'link_address', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
