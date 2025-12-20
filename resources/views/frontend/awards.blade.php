@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'الجوائز'])

<section class="page-content">

    <section class="awards-section py-5">
        <div class="container">


            <div class="row g-4">
                @if($awards && $awards->count() > 0)
                    @foreach($awards as $index => $award)
                    <div class="col-md-6 col-lg-4">
                        <div class="award-card animate-up">
                            <div class="award-icon {{ ($index % 3 == 1) ? 'gold' : '' }}">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <h5 class="award-title">{{ $award->name }}</h5>
                            <p class="award-text">
                                {{ $award->description }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>



</section>

@endsection
