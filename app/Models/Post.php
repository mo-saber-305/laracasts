<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'slug', 'title', 'excerpt', 'body', 'published_at'];

    protected $with = ['category', 'author'];
    protected $dates = ['published_at'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['category'] ?? false, function ($q, $category) {
            $q->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function ($q, $author) {
            $q->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });

        $query->when($filters['search'] ?? false, function ($q, $search) {
            $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%');
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
