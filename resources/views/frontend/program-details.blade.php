@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => $program->title])

<section class="page-content program-single">


    <div class="container">
        <header class="d-flex flex-wrap justify-content-between align-items-center mb-3 border-bottom pb-2">
            <div class="d-flex align-items-center gap-3">
                <div>
                    <h2 class=" mb-0">{{ $program->title }}</h2>
                    <small class="text-muted">{{ $program->category->title }}</small>
                </div>
            </div>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                {{-- <a href="{{ route('frontend.program.show', $program->slug) }}" class="btn btn-full ">شارك في المبادرة</a>
                <a href="{{ route('frontend.program.show', $program->slug) }}" class="btn  btn-outline"> معرض الصور</a> --}}
            </div>
        </header>



        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card ">
                    <img src="{{ $program->inside_image?->getUrl() }}" class="img-fluid rounded mb-3" alt="صورة المبادرة">
                    <div class="mb-3">
                        <span class="tag me-1"><i class="fa-solid fa-children"></i> الفئة: {{ \App\Models\Program::GROUP_SELECT[$program->group] }}</span>
                        <span class="tag me-1"><i class="fa-regular fa-clock"></i> المدة: {{ $program->start_date }} - {{ $program->end_date }}</span>
                        <span class="tag me-1"><i class="fa-solid fa-location-dot"></i> المكان: {{ $program->address }}</span>
                    </div>
                    <p class="lead">{!! $program->description !!}</p>
                    <hr>
                    <h2>نبذة عن المبادرة</h2>
                    <p>{!! $program->description_2 !!}</p>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card mb-3">
                    <h3>الجدول الزمني</h3>
                    <ul class="list-unstyled ps-3 border-start border-2 border-secondary">
                        @if ($program->programTimelines != null)
                        @foreach ($program->programTimelines as $timeline)
                        <li class="mb-2"><i class="fa-solid fa-calendar-days text-warning"></i><b>{{ $timeline->title }}:</b> {{ $timeline->description }}</li>
                        @endforeach
                        @else
                        <li class="mb-2">لا يوجد جدول زمني</li>
                        @endif
                    </ul>
                </div>
                <div class="card">
                    <h2>الأهداف</h2>
                    <ul class="list-unstyled ps-3 border-start border-2 border-secondary">
                        @if ($program->goals != null)
                        @foreach ($program->goals as $goal)
                        <li class="mb-2"><i class="fa-solid fa-bullseye text-warning"></i><b>{{ $goal->title }}:</b> {{ $goal->description }}</li>
                        @endforeach
                        @else
                        <li class="mb-2">لا يوجد أهداف</li>
                        @endif
                    </ul>
                </div>



            </div>
        </div>

    </div>
</section>
<!-- footer -->
@endsection
