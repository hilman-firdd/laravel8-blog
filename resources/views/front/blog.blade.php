@extends('layouts.front.main')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Blog Detail</h2>
    <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
  <div class="container" data-aos="fade-up">

  @if($blog)
  <div class="row">
    <div class="col-lg-8">
      <img src="{{ asset('img/blog/'.$blog->gambar1) }}" class="img-fluid" alt="">
      <h3>{{ $blog->title }}</h3>
      {!! $blog->body !!}
    </div>
    <div class="col-lg-4">

      <div class="course-info d-flex justify-content-between align-items-center">
        <h5>Category</h5>
        <p><a href="#">{{ $blog->category->name }}</a></p>
      </div>

    </div>
  </div>
  @endif

  </div>
</section><!-- End Cource Details Section -->

@endsection