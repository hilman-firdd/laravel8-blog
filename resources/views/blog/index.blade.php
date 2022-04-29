@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
              </ol>
            </nav>

            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif


            <div class="card">
                <div class="card-header"><a href="{{ route('blog.create') }}" class="btn btn-success btn-sm">Create Data</a></div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($blog as $data)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->category->name }}</td>
                            <td>{{ $data->created_at->diffForHumans() }}</td>
                            <td>
                              <form action="{{ route('blog.destroy', $data->id) }}" method="post">
                                @method('delete') 
                                @csrf  
                                <input type="text" hidden name="id" id="id">
                                  <div class="btn-group">
                                    <a href="{{ route('testimony.index', $data->id) }}" class="btn btn-sm btn-info">Testimoni</a>
                                    <a href="{{ route('blog.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="submit" onClick="return confirm('Yakin ingin hapus data ?')" class="btn btn-sm btn-danger">Delete</button>
                                  </div>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection