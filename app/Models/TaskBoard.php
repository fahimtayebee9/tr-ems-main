<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskBoard extends Model
{
    use HasFactory;

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by', 'id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function client()
    {
        return $this->belongsTo(ClientAccount::class, 'client_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(TaskComment::class, 'task_id', 'id');
    }

    public function checkLists()
    {
        return $this->hasMany(TaskCheckList::class, 'task_board_id', 'id');
    }
}
