@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
  </div>
  {{-- Form Bootstrap --}}
  <div class="col-lg-8">
      <form method="POST" action="/dashboard/categories/{{ $category->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="name" class="form-label">Name Category</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" 
            id="name" name="name" value="{{ old('name', $category->name) }}"">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-2">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" 
            id="slug" name="slug" value="{{ old('name', $category->slug) }}"">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary">Create Category</button>
      </form>
  </div>

  <script>
    // make automatic slug
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    
    title.addEventListener('change', function() {
        fetch(`/dashboard/categories/checkCatSlug?name=${name.value}`)
        .then(res => res.json())
        .then(data => slug.value = data.slug)
    });
    

  </script>

@endsection