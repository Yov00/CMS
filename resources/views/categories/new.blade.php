@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-default">
           <div class="card-header">
            Add new catergory
           </div>
           <div class="card-body">
            <form action="/categories/new" method="POST">
                @csrf
            <input type="hidden" name="checkk" value="{{isset($checkk) ? $checkk : ''}}"/>
                <div class="form-group">
                    <label for="name" class="label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Name...">
                </div>
          
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Create New">
                </div>
    
             
                    @error('name')
                    <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    
                
            </form>
           </div>
        </div>

       
    </div>
@endsection