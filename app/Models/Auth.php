<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    use HasFactory;

    protected $table = 'auth';

    protected $fillable = ['username', 'email', 'role_id'];

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

