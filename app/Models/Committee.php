<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Committee extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'stud_id';
    protected $fillable = [
        'stud_id', 'name', 'email', 'password', 'activation_status', 'position'
    ];

    public function role()
    {
        return $this-> hasMany(Role::class);
    }
}
