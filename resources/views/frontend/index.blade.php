@extends('frontend.layouts.main')
@section('content')

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach ($sliders as $slider)
        <!-- Slide 1 -->
        <div class="swiper-slide hero-slide" style="background-image: url('{{ $slider->image?->getUrl() }}');">
            <div class="overlay"></div>
            <div class="text-box">
                <p>{{ $slider->sub_title }}</p>
                <h2>{{ $slider->title }}</h2>
            </div>
        </div>
        @endforeach

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

</section>

<section class="hero-slide-decoration">
    <div class="moshaf"><img src="{{ asset('frontend/assets/img/HolyQuraan.png') }}" /></div>
</section>



<!-------------------HomeAbout--------------------------->
<section class="HomeAbout">
    <div class="container">
        <p class="text-center">
            {!! get_setting('about_text') !!}
        </p>
    </div>
</section>

<!----------------about------------------------>
<!-- SAMPLE CONTENT -->
<section class=" container mb-5">
    <div class="row">
        <div class="col-lg-4 mb-3">

            <div class="card h-about-block text-center p-3  h-100">
                <div class="icon"> <img src="{{ asset('frontend/assets/img/elements-2.png') }}" /> </div>
                <h5>الرسالة</h5>

                <div class="decoreTop"></div>
                <p>{!! get_setting('vision_text') !!}</p>
                <div class="decoreBottom"></div>
            </div>
        </div>


        <div class="col-lg-4 mb-3">

            <div class="card h-about-block text-center p-3  h-100">
                <div class="icon"> <img src="{{ asset('frontend/assets/img/elements-1.png') }}" /> </div>
                <h5>الرؤيــــــة</h5>

                <div class="decoreTop"></div>
                <p>{!! get_setting('mission_text') !!}</p>
                <div class="decoreBottom"></div>
            </div>
        </div>



        <div class="col-lg-4 mb-3">

            <div class="card h-about-block text-center p-3  h-100">
                <div class="icon"> <img src="{{ asset('frontend/assets/img/elements.png') }}" /> </div>
                <h5>القيــــــــم</h5>

                <div class="decoreTop"></div>
                <p>{!! get_setting('values_text') !!}</p>
                <div class="decoreBottom"></div>
            </div>
        </div>
    </div>
</section>

<!--------------programes--------------------------->
<section class="Programe-container">
    <div class="sec-title text-center">
        <div class="decore"><img src="{{ asset('frontend/assets/img/decore-green.png') }}" /></div>
        <h2>البرامج والمبادرات </h2>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($programs as $program)
            <div class="col">
                <div class="Programe">
                    <img src="{{ $program->photo?->getUrl() }}" />
                    <h3>{{ $program->title }}</h3>
                    <p>{{ \App\Models\Program::GROUP_SELECT[$program->group] }}</p>
                    <a href="{{ route('frontend.program.show', $program->slug) }}" class="btn btn-full">المزيد</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>



<section class="news-container">
    <div class="sec-title text-center">
        <div class="decore"><img src="{{asset('frontend/assets/img/decore-green.png') }}" /></div>
        <h2>أخبــار بنـــــــــان </h2>
    </div>





    <div class="container my-5">
        <div class="swiper newsSwiper">
            <div class="swiper-wrapper">
                @foreach($news as $newsItem)
                <div class="swiper-slide">
                    <div class="new">
                        <div class="new-detail">
                            <div class="news-pic">
                                <div class="news-pic-bg"></div>

                                <img src="{{ $newsItem->photo->getUrl() }}" alt="{{ $newsItem->title }}">

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

            <!-- أزرار -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

</section>


<section class="numbers-container">
    <div class="overlay">
        <div class="sec-title text-center">
            <div class="decore"><img src="{{ asset('frontend/assets/img/decore-green.png') }}" /></div>
            <h2 class="color-white">بنــان في أرقام </h2>
        </div>

        <div class="container counters-container">
            <div class="row">
                <div class="col-md-2">
                    <div class="numb">
                        <div class="counter-box" data-target="{{get_setting('clients_count')}}">
                            <div class="icon"><img src="{{ asset('frontend/assets/img/numb-icon1.png') }}" /></div>
                            <span class="counter">{{get_setting('clients_count')}}</span>
                            <p>عدد العملاء</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="numb">
                        <div class="counter-box" data-target="{{get_setting('lessons_count')}}">
                            <div class="icon"><img src="{{ asset('frontend/assets/img/numb-icon2.png') }}" /></div>
                            <span class="counter">{{get_setting('lessons_count')}}</span>
                            <p> عدد الدروس </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="numb">
                        <div class="counter-box" data-target="{{get_setting('teachers_count')}}">
                            <div class="icon"><img src="{{ asset('frontend/assets/img/numb-icon3.png') }}" /></div>
                            <span class="counter">{{get_setting('teachers_count')}}</span>
                            <p>المعلمين والمتطوعين </p>
                        </div>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="numb">
                        <div class="counter-box" data-target="{{get_setting('certificates_count')}}">
                            <div class="icon"><img src="{{ asset('frontend/assets/img/numb-icon4.png') }}" /></div>
                            <span class="counter">{{get_setting('certificates_count')}}</span>
                            <p>الشهادات </p>
                        </div>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="numb">
                        <div class="counter-box" data-target="{{get_setting('initiatives_count')}}">
                            <div class="icon"><img src="{{ asset('frontend/assets/img/numb-icon5.png') }}" /></div>
                            <span class="counter">{{get_setting('initiatives_count')}}</span>
                            <p> المبادرات</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="numb">
                        <div class="counter-box" data-target="20">
                            <div class="icon"><img src="{{ asset('frontend/assets/img/numb-icon6.png') }}" /></div>
                            <span class="counter">{{get_setting('courses_count')}}</span>
                            <p>
                                دورات تطويرية
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
