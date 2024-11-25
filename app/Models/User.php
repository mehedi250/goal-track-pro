<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // User Role
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_MANAGER = 'MANAGER';
    const ROLE_MEMBER = 'MEMBER';

    // Status
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    
    protected $fillable = [
        'name',              // STRING, NOT NULL
        'email',             // STRING, UNIQUE, NOT NULL
        'password',          // STRING, NOT NULL
        'joining_date',      // DATE, NULLABLE
        'exit_date',         // DATE, NULLABLE
        'role',              // ENUM ['ADMIN', 'MANAGER', 'MEMBER'], NOT NULL
        'status',            // ENUM ['ACTIVE', 'INACTIVE'], default 'ACTIVE'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship with teams 
    public function teams()
    {
        return $this->hasMany(Team::class, 'manager_id');
    }

    // Relationship with tasks (user can be assigned multiple tasks)
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    // Relationship with notifications (one user can have many notifications)
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    // Relationship with projects (projects created by this user)
    public function projects()
    {
        return $this->hasMany(Project::class, 'manager_id');
    }
}
