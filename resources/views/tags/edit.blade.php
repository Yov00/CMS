@extends('layouts.app')

@section('content')
   
        <h3>
            Edit <span style="text-transform:capitalize;">"{{$tag->name}}"</span> tag
        </h3>
        
        <form action="{{route('tags.update',$tag->id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$tag->name}}" placeholder="Name...">
            </div>
      
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update">
            </div>

         @include('partials.errors')
                
            
        </form>
   
@endsection