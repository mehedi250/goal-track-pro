<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    // Type
    const TYPE_UPDATE_ALERT = 'UPDATE_ALERT';
    const TYPE_DEADLINE_ALERT = 'DEADLINE_ALERT';
    const TYPE_OVERDUE_ALERT = 'OVERDUE_ALERT';

    // Is Read
    const IS_READ_TRUE = 'TRUE';
    const IS_READ_FALSE = 'FALSE';


    protected $fillable = [
        'user_id',   // BIGINT UNSIGNED, references users table
        'type',      // ENUM ['UPDATE_ALERT', 'DEADLINE_ALERT', 'OVERDUE_ALERT'], default 'UPDATE_ALERT'
        'message',   // TEXT, NOT NULL
        'is_read',   // ENUM ['TRUE', 'FALSE'], default 'FALSE'
    ];

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
