@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'الأخبار'])

<section class="page-content">
    <div class="container my-5">
        <div class="row">
            @foreach($news as $newsItem)
            <div class="col-md-3 mb-4">
                <div class="new">
                    <div class="new-detail">
                        <div class="news-pic">
                            <div class="news-pic-bg"></div>
                            @if($newsItem->photo)
                                <img src="{{ $newsItem->photo->getUrl() }}" alt="{{ $newsItem->title }}">
                            @else
                                <img src="assets/img/newsImage01.png" alt="{{ $newsItem->title }}">
                            @endif
                        </div>
                        <div class="new-details">
                            <ul>
                                <li><span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-icon lucide-calendar">
                                            <path d="M8 2v4" />
                                            <path d="M16 2v4" />
                                            <rect width="18" height="18" x="3" y="4" rx="2" />
                                            <path d="M3 10h18" /></svg></span>{{ $newsItem->created_at->format('d M Y') }}</li>
                                <li><span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                            <circle cx="12" cy="10" r="3" /></svg></span>{{ $newsItem->address ?? 'المدينة المنورة' }}</li>
                            </ul>
                        </div>
                        <h4 class="mt-3">{{ $newsItem->title }}</h4>
                        <p>{{ $newsItem->short_description }}</p>
                        <a href="{{ route('frontend.news.show', $newsItem->slug) }}" class="btn btn-outline">المزيد</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $news->links(
                'vendor.pagination.custom'
            ) }}
        </div>
    </div>
</section>
@endsection
