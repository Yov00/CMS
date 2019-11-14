<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Search;

class PostsController extends Controller
{
    // showing individual blog
    public function show(Post $post)
    {
       
        return view('blog.show')->with('post',$post);
    }

    // When category is chosen
    public function category(Category $category)
    {
       

        return view('blog.category')->with([
            'category'=>$category,
            'posts'=>$category->posts()->searched()->simplePaginate(6),
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            ]);
    }

    // When tag is chosen
    public function tag(Tag $tag)
    {
        
        return view('blog.tag')->with([
            'tag'=>$tag,
            'tags'=>Tag::all(),
            'posts'=>$tag->posts()->searched()->simplePaginate(6),
            'categories'=>Category::all(),
            ]);
    }
}
