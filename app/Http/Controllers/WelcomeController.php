<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
class WelcomeController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if($search){
            $post = Post::where('title','LIKE',"%{$search}%")->simplePaginate(6);
        }
        else{
            $post = Post::simplePaginate(6);
        }

        return view('welcome')->with([
                'posts'=>$post,
                'categories'=>Category::all(),
                'tags'=>Tag::all()
        ]);
    }
}
