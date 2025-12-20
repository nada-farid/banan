@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'اللوائح والسياسات'])
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
                    @foreach ($policies as $policy)
                    <div class="col-md-2 card" data-type="{{ $policy->category_id }}">
                        <div class="Programe">
                            <img src="{{ $policy->file?->getUrl() }}" />
                            <h3> {{ $policy->title }} </h3>
                            <p> {{ $policy->description }} </p>
                            <div class="study-actions">
                                <a href="{{ $policy->file?->getUrl() }}" target="_blank" class="  btn btn-full"><i class="fas fa-download"></i> تحميل</a>
                                <a href="{{ $policy->file?->getUrl() }}" target="_blank" class="btn btn-outline"><i class="fas fa-eye"></i> قراءة</a>
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
