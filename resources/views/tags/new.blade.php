@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-default">
           <div class="card-header">
            Add new Tag
           </div>
           <div class="card-body">
           <form action="{{route('tags.store')}}" method="POST">
                @csrf
            <input type="hidden" name="checkk" value="{{isset($checkk) ? $checkk : ''}}"/>
                <div class="form-group">
                    <label for="name" class="label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Name...">
                </div>
          
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Create New">
                </div>
    
             
                @include('partials.errors')
                    
                
            </form>
           </div>
        </div>

       
    </div>
@endsection