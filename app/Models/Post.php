<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // TODO: Change the autogenerated stub
    }

    public function getThumbnailAttribute($thumbnail): string
    {
        if (isset($thumbnail)){
            return asset('storage/'.$thumbnail);
        }
        return asset('storage/thumbnails/DFm7t78cNLBbfjUJGdkkzUHT2PD1U7DzdMqIm5Ao.jpg');
    }

    public function scopeFilter($query, array $filters) : void
    {
        /* search by Post */
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn($query) =>
        $query->where('title','like','%'.$search.'%')
            ->orWhere('body','like','%'.$search.'%')
        )
        );

        /* search by Category */
        $query->when($filters['category'] ?? false,
            fn ($query, $category) => $query
                ->whereHas('category', fn ($query) =>
                $query->where('name', $category)
                )->orWhereHas('category', fn ($query) =>
                $query->where('slug', $category)
                )
        );

        /* search by User */
        $query->when($filters['author'] ?? false,
            fn ($query, $author) => $query
                ->whereHas('author', fn ($query) =>
                $query->where('username', $author))
        );
    }

}
