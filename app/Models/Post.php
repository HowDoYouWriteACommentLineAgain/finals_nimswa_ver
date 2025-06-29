<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $casts = [
        'type' => Status::class,
    ];
    protected $fillable = [
        'title', 
        'content', 
        'image', 
        'published_date', 
        'status'
    ];

    public function analytic(): HasOne
    {
        return $this->hasOne(Analytic::class);
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_user_relationship');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag_relationship');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
