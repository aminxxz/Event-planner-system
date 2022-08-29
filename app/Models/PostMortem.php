<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMortem extends Model
{
    use HasFactory;
    protected $primaryKey = 'pm_id';
    protected $fillable = [
        'pm_id', 'issue', 'suggestion', 'solution', 'role_id' 
    ];

    public function role()
    {
        return $this-> belongsTo(Role::class);
    }

}
