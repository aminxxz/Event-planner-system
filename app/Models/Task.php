<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $primaryKey = 'task_id';
    protected $fillable = [
        'task_id', 'task_name', 'task_description', 'due_date', 'task_status', 'role_id' 
    ];

    public function role()
    {
        return $this-> belongsTo(Role::class);
    }
}
