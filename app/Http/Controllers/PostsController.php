<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Post;
use App\Tag;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['verifyCategoryCount','auth'])->only(['create','store']);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        return view('posts.index')->with('posts',Post::all());;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('posts.create')->withCategories(Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        // uploading the image
        // create the post
        // flash message
        // redirect user
       
        $image = $request->image->store('posts');
     
       $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$image,
            'category_id'=>$request->category_id,
            'published_at'=>$request->published_at,
            'user_id' => auth()->user()->id
        ]);

        if(request()->tags)
        {
            $post->tags()->attach(request()->tags);
        }



        session()->flash('success','You have created new Post successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with([
            'post'=>$post,
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request,Post $post)
    {
        $data = $request->only(['title','description','content','image','publised_at','category_id']);
      
        if($request->hasFile('image'))
        {
            $image = $request->image->store('posts');
            $post->deleteImage();
            $data['image'] = $image;
        }
        if(request()->tags)
        {
            $post->tags()->sync(request()->tags);
        }
       $post->update($data);

        session()->flash('success','You have updated the post successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed())
        {
            $post->forceDelete();
            $post->deleteImage();
            $message= " Deleted";
        }
        else{
            $post->delete();
            $message = " Trashed";
        }
        session()->flash('success',$post->title.$message.' successfully');
        return back();
    }
    /*
     * Display a list of all trashed posts
    */


    public function trashed()
    {
       $trashed = Post::onlyTrashed()->get();
       $trashPage = true;
       return view('posts.index')->with([
           'posts'=>$trashed,
           'trashPage'=>$trashPage
           ]);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();    
     
        $post->restore();
        session()->flash('success',$post->title.' restored successfully');

        return back();
    }
    
    
}
