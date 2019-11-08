@extends('layouts.app')

@section('content')
   
       
      <div class="d-flex justify-content-end mb-2">
        <a href="/tags/create" class="btn btn-success">Add tag</a>
      </div>
        <div class="card card-default"  style="position:unset">
            <div class="card-header">
                Tags
             
            </div>
            <div class="card-body">
                @if(count($tags) > 0)
               
                    @foreach($tags as $tag)
                    <div class="row mb-2"  style="border-bottom:1px solid lightgray;padding:5px 0;" >
                        <div class="col-md-8">
                          <div class="row">
                          <div class="col-md-8">
                            {{$tag->name}}
                          </div>
                          <div class="col-md-4">
                            Posts: {{isset($tag->posts) ? count($tag->posts):0 }}
                          </div>
                        </div>
                        </div>
                        <div class="col-md-4" style="display:flex;justify-content:space-evenly;position:static;">
                          <a href="/tags/{{$tag->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                         
                          <button type="submit" onclick="displayModal({{$tag->id}})" class="btn btn-danger btn-sm">Delete</button>
                        <div class="Confirm-deletion modale{{$tag->id}}" style="display:none;">
                              <div class="card card-default">
                              <div class="card-header">Delete "{{$tag->name}}"</div>
                              <div class="card-body">
                               <h3 class="text-center justify-self-center">
                                 Are you sure you want to delete this tag?
                               </p>
                              </div>
                              <div class="card-footer">
                               
                                  
                                      <div class="float-right d-flex">
                                        <button onclick="displayModal({{$tag->id}})" class="btn btn-primary" style="margin:0px 10px 0 0;">NO</button>
                                     
                                    
                                          <form action="{{route('tags.destroy',$tag->id)}}" method="POST">
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
                        <h4>There are no tags to show.</h4>
               
                    </div>
                  @endif
             </div>
             
            </div>
        
       
    
               
@endsection



