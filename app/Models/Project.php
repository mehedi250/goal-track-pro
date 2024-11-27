<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    const STATUS_OPEN = 'OPEN';
    const STATUS_RUNNING = 'RUNNING';
    const STATUS_COMPLETE = 'COMPLETE';

    protected $fillable = [
        'name',            // STRING, NOT NULL
        'description',     // TEXT, NULLABLE
        'team_id',         // BIGINT UNSIGNED, NOT NULL
        'manager_id',      // BIGINT UNSIGNED, NOT NULL
        'created_by',      // BIGINT UNSIGNED, NOT NULL
        'start_date',      // DATE, NOT NULL
        'end_date',        // DATE, NOT NULL
        'total_value',     // INTEGER, default 0
        'complete_value',  // INTEGER, default 0
        'status',          // ENUM ['OPEN', 'RUNNING', 'COMPLETE'], default 'OPEN'
    ];

    // Relationship with the Team model
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Relationship with the User model (as manager)
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
