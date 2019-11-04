@extends('layouts.app')

@section('content')
   
        <h3>
            Edit <span style="text-transform:capitalize;">"{{$category->name}}"</span> Category
        </h3>
        
        <form action="/categories/{{$category->id}}/update" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}" placeholder="Name...">
            </div>
      
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update">
            </div>

         
                @error('name')
                <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                
            
        </form>
   
@endsection