@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="breadcrumb-item"><a href="{{ route('testimony.index', $testimony->blog_id) }}">Testimony</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header"><a href="{{ route('testimony.index', $testimony->blog_id) }}" class="btn btn-dark btn-sm">Back</a></div>

                <div class="card-body">
                  <form action="{{ route('testimony.update', $testimony->id) }}" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $testimony->blog_id }}">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required value="{{ $testimony->title }}">
                      @error('title')
                        <small id="passwordHelpBlock" class="form-text text-danger">
                          {{ $message }}
                        </small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="desc">Description</label>
                      <input type="text" name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" required value="{{ $testimony->desc }}">
                      @error('desc')
                        <small id="passwordHelpBlock" class="form-text text-danger">
                          {{ $message }}
                        </small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Save</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection