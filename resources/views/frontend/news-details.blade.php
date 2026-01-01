@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'الأخبار'])

    <section class="page-content">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inside new">


                        <div class="new-detail">
                            <div class="news-pic">
                                <div class="news-pic-bg"></div>
                                @if($news->photo)
                                    <img src="{{ $news->photo->getUrl() }}" alt="{{ $news->title }}">
                                @else
                                    <img src="assets/img/newsImage01.png" alt="{{ $news->title }}">
                                @endif
                            </div>
                            <div class="new-details">
                                <ul>
                                    <li><span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-icon lucide-calendar"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg></span>{{ $news->created_at->format('d M Y') }}</li>
                                    <li><span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg></span>{{ $news->address ?? 'المدينة المنورة' }}</li>
                                </ul>
                            </div>

                            <!-- Share Section -->
                            @php
                                $currentUrl = route('frontend.news.show', $news->slug);
                                $shareText = $news->title;
                            @endphp
                            <div class="share-box">
                                <span class="title">شارك الخبر:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($currentUrl) }}" target="_blank" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode($currentUrl) }}&text={{ urlencode($shareText) }}" target="_blank" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                                <a href="https://wa.me/?text={{ urlencode($shareText . ' ' . $currentUrl) }}" target="_blank" class="share-btn whatsapp"><i class="fab fa-whatsapp"></i></a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($currentUrl) }}" target="_blank" class="share-btn linkedin"><i class="fab fa-linkedin-in"></i></a>
                            </div>

                            <h4 class="mt-3">{{ $news->title }}</h4>
                            {!! $news->description !!}
                            
                            @if($news->file)
                                <div class="news-file mt-4 p-3" style="background: #f8f9fa; border-radius: 8px; border: 1px solid #dee2e6;">
                                    <h5 class="mb-3">الملف المرفق:</h5>
                                    <a href="{{ $news->file->getUrl() }}" target="_blank" class="btn btn-primary" download>
                                        <i class="fa fa-download"></i> تحميل الملف
                                        <small class="d-block mt-1" style="font-size: 12px;">{{ $news->file->name }}</small>
                                    </a>
                                </div>
                            @endif
                        </div>




                        {{-- <div class="post-share-tags">
                            <!-- Tags Section -->
                            @if($news->description_2)
                            <div class="tags-box">
                                <span class="title">الكلمات الدلالية:</span>
                                {!! $news->description_2 !!}
                            </div>
                            @endif
                        </div> --}}



                    </div>
                </div>


            </div>

        </div>


    </section>
@endsection
