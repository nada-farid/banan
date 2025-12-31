\@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'التقارير'])
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
                    @foreach ($reports as $report)
                    <div class="col-md-3 card mt-4" data-type="{{ $report->category_id }}">
                        <div class="study-block">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset(get_setting('logo_footer')) }}" alt="Study Cover">
                            </div>
                            <div class="study-content">
                                <h3 class="study-title">{{ $report->title }}</h3>
                                <p class="study-desc"> {{ $report->description }} </p>
                                <div class="study-actions">
                                    <a href="{{ $report->file?->getUrl() }}" target="_blank" class="  btn btn-full"><i class="fas fa-download"></i> تحميل</a>
                                    <a href="{{ $report->file?->getUrl() }}" target="_blank" class="btn btn-outline"><i class="fas fa-eye"></i> قراءة</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $reports->links(
    'vendor.pagination.custom'
) }}
            </div>
</section>
@endsection
