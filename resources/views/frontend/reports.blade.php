@extends('frontend.layouts.main')
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
                    <div class="col-md-2 card" data-type="{{ $report->category_id }}">
                        <div class="Programe">
                            <img src="{{ $report->file?->getUrl() }}" />
                            <h3> {{ $report->title }} </h3>
                            <p> {{ $report->description }} </p>
                            <div class="study-actions">
                                <a href="{{ $report->file?->getUrl() }}" target="_blank" class="  btn btn-full"><i class="fas fa-download"></i> تحميل</a>
                                <a href="{{ $report->file?->getUrl() }}" target="_blank" class="btn btn-outline"><i class="fas fa-eye"></i> قراءة</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>


    </div>




</section>
@endsection
