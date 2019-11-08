@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
                {{isset($post) ? 'Edit "'.$post->title.'"':'Create Post'}} 
        </div>
        <div class="card-body">
        <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @if (isset($post))
                    @method('PATCH')
            @endif
            @csrf
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{isset($post) ? $post->title :''}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{isset($post) ? $post->description :''}}</textarea>
            </div>
                <div class="form-group">
                <label for="content">Content</label>
             
                <input id="content" type="hidden" name="content" class="col-md-6"  value="{{isset($post) ? $post->content :''}}">
                <trix-editor input="content" ></trix-editor>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
              
                    <select name="category_id" id="category_id" class="custom-select">
                   
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" class="form-control" {{isset($post) && $post->category_id == $category->id ? 'selected' :''}}>
                            {{$category->name}}
                        </option>
                        @endforeach
                      
                    </select>
                   
            </div>
            @if($tags->count() > 0)
            <div class="form-group">
                <label for="tags">Tags</label>
              
                <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                        @if (isset($post))
                            @if($post->hasTag($tag->id))
                                selected
                            @endif
                        @endif
                        
                        >{{$tag->name}}</option>
                    @endforeach
                </select>
            
            </div>
            @endif
            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="text" class="form-control" name="published_at" id="published_at" value="{{isset($post) ? $post->published_at :''}}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                
                @if (isset($post))
                    <div class="form-group">
                        <img src="{{asset('storage/'.$post->image)}}" width="100%" alt="">
                    </div>
                @endif
                <input type="file" class="form-control" name="image" id="image" src="axxaxaxaax">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                        {{isset($post) ? 'Update Post' :'Create Post'}}        
                </button>
            </div>
        </form>
        </div>
    </div>


@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.tags-selector').select2();
    });

    flatpickr('#published_at',{
        enableTime: true
    });
</script>
@endsection


