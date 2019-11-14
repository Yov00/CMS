<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = [
        'published_at'
    ];

    /**
     * Deleting the Model's Image from storage
     * @return void
     * 
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // I post has tag
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }


    public function  user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }



    // Search for posts from wherever user selected have selected
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) {
            return $query->published();
        } else {
            return $query->published()->where('title', 'LIKE', "%{$search}%");
        }
    }
}
