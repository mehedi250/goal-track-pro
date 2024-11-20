<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $table = 'team_members';

    // Status
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    protected $fillable = [
        'team_id',  // BIGINT UNSIGNED, NOT NULL
        'user_id',  // BIGINT UNSIGNED, NOT NULL
        'status',   // ENUM ['ACTIVE', 'INACTIVE'], default 'ACTIVE'
    ];


    // Relationship with the Team model
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
