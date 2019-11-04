@extends('layouts.app')

@section('content')
   
       
      <div class="d-flex justify-content-end mb-2">
        <a href="/categories/new" class="btn btn-success">Add Category</a>
      </div>
        <div class="card card-default"  style="position:unset">
            <div class="card-header">
              Categories
            </div>
            <div class="card-body">
                @if(count($categories)>0)
               
                    @foreach($categories as $category)
                    <div class="row mb-2"  style="border-bottom:1px solid lightgray;padding:5px 0;" >
                        <div class="col-md-8">
                          <div class="row">
                          <div class="col-md-8">
                            {{$category->name}}
                          </div>
                          <div class="col-md-4">
                            Posts: {{count($category->posts) }}
                          </div>
                        </div>
                        </div>
                        <div class="col-md-4" style="display:flex;justify-content:space-evenly;position:static;">
                          <a href="/categories/{{$category->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                         
                          <button type="submit" onclick="displayModal({{$category->id}})" class="btn btn-danger btn-sm">Delete</button>
                        <div class="Confirm-deletion modale{{$category->id}}" style="display:none;">
                              <div class="card card-default">
                              <div class="card-header">Delete "{{$category->name}}"</div>
                              <div class="card-body">
                               <h3 class="text-center justify-self-center">
                                 Are you sure you want to delete this category?
                               </p>
                              </div>
                              <div class="card-footer">
                               
                                  
                                      <div class="float-right d-flex">
                                        <button onclick="displayModal({{$category->id}})" class="btn btn-primary" style="margin:0px 10px 0 0;">NO</button>
                                     
                                    
                                          <form action="/categories/delete/{{$category->id}}" method="POST">
                                              @csrf
                                              {{method_field('DELETE')}}
                                            <button class="btn btn-warning">YES</button>
                                          </form>
                                        </div>
                                  
                              </div>
                              </div>
                            </div>
                        </div>
                    
                    </div>
                 
                    @endforeach
                  
                  @else
                    <div class="container-fluid" style="width:100%;text-align:center">
                        <h4>There are no categories to show.</h4>
               
                    </div>
                  @endif
             </div>
             
            </div>
        
       
    
               
@endsection



