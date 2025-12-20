@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'الشركاء'])

<section class="page-content">

    <div class="container">
        <div class="row">
            @if($partners && $partners->count() > 0)
            @foreach($partners as $partner)
            <div class="col-lg-3 col-sm-6">
                <div class="gifts-img style-two text-center">
                    @if($partner->link)
                    <a href="{{ $partner->link }}" target="_blank" rel="noopener noreferrer">
                        @endif
                        @if($partner->image)
                        <img alt="{{ $partner->name ?? 'شريك' }}" src="{{ $partner->image->getUrl() }}" class="img-fluid">
                        @else
                        <img alt="{{ $partner->name ?? 'شريك' }}" src="{{ asset('frontend/assets/img/logo-icon.png') }}" class="img-fluid">
                        @endif
                        @if($partner->link)
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>




    </div>


</section>
@endsection
