@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header"><a href="{{ route('category.index') }}" class="btn btn-dark btn-sm">Back</a></div>

                <div class="card-body">
                  <form action="{{ route('category.update', $category->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                      <label for="name">Category Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ $category->name }}" placeholder="Category Name...">
                      @error('name')
                        <small id="passwordHelpBlock" class="form-text text-danger">
                          {{ $message }}
                        </small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection