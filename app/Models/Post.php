<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "content",
        "media",
        "status",
        'is_public',
        "likes",
        "comments",
        "is_page_post",
        "page_id",
        "is_group_post",
        "group_id",
    ];


    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
