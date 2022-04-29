@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Data</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header"><a href="{{ route('blog.index') }}" class="btn btn-dark btn-sm">Back</a></div>

                <div class="card-body">
                  <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required value="{{ old('title') }}" placeholder="Title...">
                      @error('title')
                        <small id="passwordHelpBlock" class="form-text text-danger">
                          {{ $message }}
                        </small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Category</label>
                      <select name="category" class="form-control" id="exampleFormControlSelect1">
                        @foreach($category as $data)
                          @if(old('category') == $data->id)
                            <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                          @else
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="body">Body</label>
                      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                      <trix-editor input="body"></trix-editor>
                      @error('body')
                        <small id="passwordHelpBlock" class="form-text text-danger">
                          {{ $message }}
                        </small>
                      @enderror
                    </div>

                    <div class="form-group row mt-2">
                      <div class="col-sm-2">
                        <img id="imageOne" src="{{ asset('img/blog.jpg')}}" alt="Image 1" width="100px" height="100px"/>
                      </div>
                      <div class="col-sm-10">
                        <label for="image1">Image 1</label>
                        <input name="image1" type="file" class="form-control-file @error('image1') is-invalid @enderror" id="image1">
                        @error('image1')
                          <small id="passwordHelpBlock" class="form-text text-danger">
                            {{ $message }}
                          </small>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2">
                        <img id="imageTwo" src="{{ asset('img/blog.jpg')}}" alt="Image 2" width="100px" height="100px"/>
                      </div>
                      <div class="col-sm-10">
                        <label for="image2">Image 2</label>
                        <input name="image2" type="file" class="form-control-file" id="image2">
                        @error('image2')
                          <small id="passwordHelpBlock" class="form-text text-danger">
                            {{ $message }}
                          </small>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2">
                        <img id="imageThree" src="{{ asset('img/blog.jpg')}}" alt="Image 3" width="100px" height="100px"/>
                      </div>
                      <div class="col-sm-10">
                        <label for="image3">Image 3</label>
                        <input name="image3" type="file" class="form-control-file" id="image3">
                        @error('image3')
                          <small id="passwordHelpBlock" class="form-text text-danger">
                            {{ $message }}
                          </small>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2">
                        <img id="imageFour" src="{{ asset('img/blog.jpg')}}" alt="Image 1" width="100px" height="100px"/>
                      </div>
                      <div class="col-sm-10">
                        <label for="image4">Image 4</label>
                        <input name="image4" type="file" class="form-control-file" id="image4">
                        @error('image4')
                          <small id="passwordHelpBlock" class="form-text text-danger">
                            {{ $message }}
                          </small>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2">
                        <img id="imageFive" src="{{ asset('img/blog.jpg')}}" alt="Image 1" width="100px" height="100px"/>
                      </div>
                      <div class="col-sm-10">
                        <label for="image5">Image 5</label>
                        <input name="image5" type="file" class="form-control-file" id="image5">
                        @error('image5')
                          <small id="passwordHelpBlock" class="form-text text-danger">
                            {{ $message }}
                          </small>
                        @enderror
                      </div>
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

@push('style')
@endpush

@push('script')
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script>
$(document).ready(function(){
  
  bsCustomFileInput.init();

    $('#image1').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#imageOne').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    });

    $('#image2').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#imageTwo').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    });

    $('#image3').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#imageThree').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    });

    $('#image4').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#imageFour').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    });

    $('#image5').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#imageFive').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    });

});
</script>

<script>
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  });
</script>
@endpush