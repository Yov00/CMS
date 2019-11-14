@extends('layouts.app')


@section('content')
<?php
       
?>
<div class="d-flex justify-content-end mb-2">
<a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
  </div>

  <div class="card card-default">
      <div class="card-header" style=" {{isset($trashPage) ? 'background-color:tomato;color:white;':''}}   ">
      {{isset($trashPage) ? 'Trashed Posts':'Posts'}}    
      </div>
      <div class="card-body">
        
         
   
          @if(count($posts)>0)
          <table class="table">
              <thead>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th></th>
                  <tbody>
                  <!--if admin -->
                    
                   <!--if admin -->
                  @foreach (Auth()->user()->isAdmin() ? $posts : Auth()->user()->posts  as $post)
              
                    <tr>
                          <td>
                          
                  <img src="{{asset('storage/'.$post->image)}}" width="120px" height="60px">
                         </td>  
                         <td style="{{$post->deleted_at ? 'color:tomato':''}}">
                             {{$post->title}}
                         </td>
                         <td>
                  
                         <a href="{{route('categories.edit',$post->category->id)}}"> 
                            {{$post->category ? $post->category->name :''}}
                          </a>
                         
                         </td>
                         @if(!$post->trashed())
                         <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                         @else
                         <form action="{{route('restore-posts',$post->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                       
                        
                         <td><button type="submit" class="btn btn-info btn-sm">Restore</button></td>
                        </form>
                         @endif
                         <td>
                         <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                             <button type="submit" class="btn btn-danger btn-sm">
                                 
                                {{$post->trashed() ? 'Delete':'Trash'}}

                             </button>
                         </form>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
              </thead>
          </table>
          @else
            <h3 class="text-center" >There are no {{isset($trashPage) ? 'trashed':''}}   posts.</h3>
          @endif
          
      </div>
  </div>
@endsection