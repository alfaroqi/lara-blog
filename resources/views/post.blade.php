@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/post">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">    
                @endif

                @if (request('category'))
                    <input type="hidden" name="author" value="{{ request('author') }}">    
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>


    @if ($post->count())
        <div class="card  mb-3">
            @if ($post[0]->image)
                <div style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post[0]->image) }}" 
                    alt="{{ $post[0]->category->name }}" class="img-fluid">
                </div>
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="card-img-top" 
                alt="{{ $post[0]->category->name }}">
              @endif
            
            <div class="card-body text-center">
            <h3 class="card-title"><a class="text-decoration-none text-dark" href="/post/{{ $post[0]->slug }}">{{ $post[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        By. <a href="/post?author={{ $post[0]->author->username }}" class="text-decoration-none">{{ $post[0]->author->name }}</a> in <a href="/post?category={{ $post[0]->category->slug }}" class="text-decoration-none">{{ $post[0]->category->name }}</a>{{ $post[0]->created_at->diffForHumans() }}
                    </small>
                </p>
            <p class="card-text">{{ $post[0]->excerpt }}</p>

            <a href="/post/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
        </div>
        
    

    <div class="container">
        <div class="row">
            @foreach ($post->skip(1) as $posts)
                
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7)">
                            <a href="/post?category={{ $posts->category->slug }}" class="text-white text-decoration-none">{{ $posts->category->name }}</a></div>
                            @if ($posts->image)
                                <img src="{{ asset('storage/' . $posts->image) }}" 
                                    alt="{{ $posts->category->name }}" class="img-fluid">
                            @else
                            <img class="card-img-top" src="https://source.unsplash.com/500x400?{{ $posts->category->name }}" 
                                alt="{{ $posts->category->name }}">
                            @endif
                            
                            <div class="card-body">
                            <h5 class="card-title">{{ $posts->title }}</h5>
                            <p><small class="text-muted">
                                    By. <a href="/post?author={{ $posts->author->username }}" class="text-decoration-none">{{ $posts->author->name }}</a>
                                        {{ $posts->created_at->diffForHumans() }}</small>
                            </p>
                            <p class="card-text">{{ $posts->excerpt}}</p>
                            <a href="/post/{{ $posts->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>

    @else
        <p class="text-center fs-4">No Post found.</p>
        
    @endif

    <div class="d-flex justify-content-end">
    {{ $post->links() }}
    </div>


@endsection