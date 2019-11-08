<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;

class TagsController extends Controller
{
    public $check;

    public function index()
    {
        return view('tags.tags')->with('tags',Tag::all());
    }

    public function create()
    {
     if(session()->has('error'))
     {
         $this->check = true;
        $checkk = $this->check;
         return view('tags.new')->with('checkk',$checkk);
     }
        return view('tags.new');
    }

    public function store(CreateTagRequest $request)
    {
     
     
        Tag::create([
            'name'=>request('name'),
        ])->save();
       
        return redirect(route('tags.index'));
    }

    public function destroy($id)
    {

        $tag = Tag::find($id);
        if($tag->posts->count() > 0)
        {
            session()->flash('error',"Tag cannot be deleted because it's associated with to some posts.");
            return back();
        }
        $tag->delete();
        
        
        session()->flash('success','Tag deleted successfully!');
        return back();
    }
    
    public function edit($id)
    {
        return view('tags.edit')->with('tag',Tag::find($id));
    }
    public function update(UpdateTagRequest $request,$id)
    {
        $tag = Tag::find($id);
        $tag->name = request('name');

        $tag->update();
        session()->flash('success','Tag update successfully!');
        return back();
    }
}
