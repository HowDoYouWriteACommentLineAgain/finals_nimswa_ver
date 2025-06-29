<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Analytic extends Model
{
    /** @use HasFactory<\Database\Factories\AnalyticFactory> */
    use HasFactory;

    protected $fillable = [
        'post_id',
        'views',
        'comments',
        'likes',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->BelongsTo(Post::class);
    }
}
