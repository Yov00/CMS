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
    function deleteImage()
    {
        Storage::delete($this->image);
    }


    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
