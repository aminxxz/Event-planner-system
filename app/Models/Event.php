<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'event_id';
    public $timestamps = false;
    protected $fillable = [
        'event_id', 'event_name', 'event_overview', 'event_status', 'event_location', 'event_guest', 'event_start_date',
        'event_end_date', 'event_start_time', 'event_end_time'
    ];

    public function role()
    {
        return $this-> hasMany(Role::class);
    }
}
