<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    // Priority
    const PRIORITY_LOW = 'LOW';
    const PRIORITY_MEDIUM = 'MEDIUM';
    const PRIORITY_HIGH = 'HIGH';

    // Status
    const STATUS_OPEN = 'OPEN';
    const STATUS_IN_PROGRESS = 'IN_PROGRESS';
    const STATUS_OVERDUE = 'OVERDUE';
    const STATUS_COMPLETE = 'COMPLETE';

    protected $fillable = [
        'assigned_to',      // BIGINT UNSIGNED, NOT NULL, references users table
        'team_id',          // BIGINT UNSIGNED, NOT NULL, references teams table
        'project_id',       // BIGINT UNSIGNED, NOT NULL, references projects table
        'title',            // STRING(255), NOT NULL
        'description',      // TEXT, NULLABLE
        'value',            // INTEGER, default 1
        'priority',         // ENUM ['LOW', 'MEDIUM', 'HIGH'], default 'LOW'
        'status',           // ENUM ['OPEN', 'IN_PROGRESS', 'OVERDUE', 'COMPLETE'], default 'OPEN'
    ];

    // Relationship with the User model (assigned_to)
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // Relationship with the Team model
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Relationship with the Project model
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
