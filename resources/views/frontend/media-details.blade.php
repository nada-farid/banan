@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => ' مكتبة الوسائط '])

<section class="page-content">


    <div class=" container">
        <div class="row">
            @foreach ($gallery->photos as $photo)
            <div class="col-lg-4 col-sm-6 p-0">
                <div class="featured-imagebox three  featured-imagebox-gallery">
                    <a href="{{ $photo->getUrl() }}" data-fancybox="gallery">
                        <div class="featured-link">
                            <div class="featured-thumbnail">
                                <img class="img-fluid w-100" width="390" height="390" src="{{ $photo->getUrl() }}" alt="gallery-img">
                            </div>
                            <div class="featured-overlay"></div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
@endsection
