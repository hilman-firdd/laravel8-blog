@extends('layouts.front.main')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Blogs</h2>
    <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Courses Section ======= -->
<section id="courses" class="courses">
  <div class="container" data-aos="fade-up">

    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      @foreach($blogs as $data)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="{{ asset('img/blog/'.$data->gambar1) }}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>{{ $data->category->name }}</h4>
                <p class="price">{{ $data->view }} views</p>
              </div>

              <h3><a href="{{ route('front.blog',$data->slug) }}">{{ $data->title }}</a></h3>
            </div>
          </div>
        </div> <!-- End Course Item-->
      @endforeach

    </div>

  </div>
</section><!-- End Courses Section -->

@endsection