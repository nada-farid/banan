@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'البرامج والمبادرات'])
<section class="page-content">

    <div class="container">


        <div class="filter-container">
            <button class="filter-btn active" data-filter="all">الكل</button>
            @foreach ($categories as $category)
            <button class="filter-btn" data-filter="{{ $category->id }}">{{ $category->title }}</button>
            @endforeach
        </div>


        <div class="cards mt-5">

            <div class="container">
                <div class="row ">
                    @foreach ($programs as $program)
                    <div class="col-md-2 card" data-type="{{ $program->category_id }}">
                        <div class="Programe">
                            <img src="{{ $program->photo?->getUrl() }}" />
                            <h3> {{ $program->title }} </h3>
                            <p> {{ $program->short_description }} </p>
                            <a href="{{ route('frontend.program.show', $program->slug) }}" class="btn btn-full">المزيد</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{ $programs->links(
            'vendor.pagination.custom'
        ) }}
    </div>




</section>
@endsection
