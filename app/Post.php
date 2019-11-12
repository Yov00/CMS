<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $guarded = [];

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
}
