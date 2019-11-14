@extends('layouts.blog')
@section('title')
Saas blog
@endsection
@section('header')

<!--<header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">-->
    <header class="header text-center text-white" style="position:relative;background: url('https://images.pexels.com/photos/418831/pexels-photo-418831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');background-size:cover;background-position:center center;">
      <div class="overlayy" style="position:absolute;top:0;left:0;width:100%;height:100%;background-color:rgba(0, 0, 0, 0.5);z-index:2;filter: blur(10px);"></div>


        <div class="container" style="z-index:3;">
        

          <div class="row">
            <div class="col-md-8 mx-auto">
              <h1>Latest Blog Posts</h1>
              <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>
  
            </div>
          </div>
  
        </div>
 </header>
@endsection

@section('content')
    <!-- Main Content -->
    <main class="main-content">
     
            <div class="section bg-gray">
              <div class="container">
                <div class="row">
      
      
                  <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">
                      @forelse ($posts as $post)
                      <div class="col-md-6">
                              <div class="card border hover-shadow-6 mb-6 d-block">
                              <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" src="{{asset('storage/'.$post->image)}}" alt="Card image cap"></a>
                                <div class="p-6 text-center">
                                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{$post->category->name}}</a></p>
                                <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show',$post->id)}}">{{$post->title}}</a></h5>
                                </div>
                              </div>
                            </div>
                      @empty
                          <p class="text-center">No results: <strong>{{request()->query('search')}}</strong></p>
                      @endforelse
                   
                    </div>
         
                      {{$posts->appends(['search'=>request()->query('search')])->links()}}
                
                  
               <!--
                    <nav class="flexbox mt-30">
                      <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                      <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
                    </nav>
                  -->

                  </div>
                  @include('partials.sidebar')
      
                </div>
              </div>
            </div>
          </main>
      
@endsection
