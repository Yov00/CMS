@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                <form action="{{route('users.update')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{auth()->user()->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="about">About</label>
                           <textarea name="about" id="about"  class="form-control">{{{auth()->user()->about ? auth()->user()->about:""}}}</textarea>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Update
                            </button>
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
    </div>

@endsection
