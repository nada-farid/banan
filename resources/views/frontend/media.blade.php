@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' =>  ' مكتبة الوسائط '])
    <section class="page-content">

        <div class="container">
            <div class="row">
                @foreach ($galleries as $gallery)
                <div class="col-md-3">
                    <div class="study-block">
                        <div class="media-image">
                            <img src="{{ $gallery->image?->getUrl() }}" alt="Study Cover" class="img-fluid">
                        </div>

                        <div class="study-content">
                            <h3 class="study-title text-center">{{ $gallery->name }}</h3>




                            <div class="study-actions">
                                <a href="{{route('frontend.media.show', $gallery->id)}}" class="btn btn-outline w-100"><i class="fas fa-eye"></i> عرض </a>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>



           {{ $galleries->links(
            'vendor.pagination.custom'
        ) }}
        </div>


    </section>
@endsection