@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $posting->title }}</h2>

                <p>By. <a href="/post?author={{ $posting->author->username }}" class="text-decoration-none">
                    {{ $posting->author->name }}</a> in <a href="/post?category={{ $posting->category->slug }}" 
                        class="text-decoration-none">{{ $posting->category->name }}</p></a>
                @if ($posting->image)
                <div style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $posting->image) }}" 
                    alt="{{ $posting->category->name }}" class="img-fluid mt-3">
                </div>
              @else
                <img src="https://source.unsplash.com/1200x400?{{ $posting->category->name }}" 
                    alt="{{ $posting->category->name }}" class="img-fluid mt-3">  
              @endif
                
                <article class="my-3 fs-5">
                  {!! $posting->body !!}
                </article>
            
            
                <a href="/post" class="d-block mt-2">Back</a>
            </div>
        </div>
    </div>
        

@endsection