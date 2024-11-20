<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    protected $fillable = [
        'name',         // STRING, NOT NULL
        'manager_id',   // BIGINT UNSIGNED, NOT NULL
        'status',       // ENUM ['ACTIVE', 'INACTIVE'], default 'ACTIVE'
    ];


    // Manager relationship
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
