<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $primaryKey = 'role_id';
    protected $fillable = [
        'role_id', 'role_name', 'event_id', 'stud_id'
    ];

    public function committee()
    {
        return $this-> belongsTo(Committee::class);
    }

    public function event()
    {
        return $this-> belongsTo(Event::class);
    }

    public function task()
    {
        return $this-> hasMany(Task::class);
    }

    public function post_mortem()
    {
        return $this-> hasMany(PostMortem::Class);
    }
}
