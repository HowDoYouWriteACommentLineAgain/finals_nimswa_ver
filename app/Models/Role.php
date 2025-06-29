<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    protected $fillables = ['role_name', 'access_level'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
