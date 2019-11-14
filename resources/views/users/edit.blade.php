@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                <form action="{{route('users.update')}}" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group">
                                <label for="image">Image</label>
                                
                           
                                @if (Auth()->user()->image)
                                <div class="form-group">
                                    <img src="{{asset('storage/'.Auth()->user()->image)}}" width="100%" alt="">
                                </div>
                                @endif
                                    <input type="file" class="form-control" name="image" id="image">
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
