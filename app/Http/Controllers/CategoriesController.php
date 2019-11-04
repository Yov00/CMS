<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
    public $check;

    public function index()
    {
        return view('categories.categories')->with('categories',Category::all());
    }

    public function create()
    {
     if(session()->has('error'))
     {
         $this->check = true;
        $checkk = $this->check;
         return view('categories.new')->with('checkk',$checkk);
     }
        return view('categories.new');
    }

    public function store(CreateCategoryRequest $request)
    {
     
     
        Category::create([
            'name'=>request('name'),
          
        ])->save();
        session()->flash('success','Category created successfully!');
        if(request('checkk'))
        {
            return redirect('posts/create');
        }
        return redirect('/categories');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        session()->flash('success','Category deleted successfully!');
        return back();
    }
    
    public function edit($id)
    {
        return view('categories.edit')->with('category',Category::find($id));
    }
    public function update(UpdateCategoriesRequest $request,$id)
    {
        $category = Category::find($id);
        $category->name = request('name');

        $category->update();
        session()->flash('success','Category update successfully!');
        return back();
    }
}
