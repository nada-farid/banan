@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'عن الجمعية'])


<section class="page-content">

    <div class="container">

        <div class="tabs-wrapper">
            <!-- Tabs Menu -->
            <div class="tabs-menu">
                <button class="active" data-tab="tab1">نبذة تعريفية</button>
                <button data-tab="tab2">الهيكل التنظيمي</button>
                <button data-tab="tab3">اللجنة التنفيذية</button>
                <button data-tab="tab4">لجنة الاستدامة المالية</button>
                <button data-tab="tab5">فريق العمل</button>
            </div>

            <!-- Tabs Content -->
            <div class="tabs-content">
                <div class="tab-pane active" id="tab1">
                    <h2>نبذة تعريفية</h2>
                    <p>
                        {!! get_setting('about_text', '') !!}
                    </p>




                    <div class="targets mt-4 ">
                        <h2> أهــدافنـا</h2>
                        @if($goals && $goals->count() > 0)
                        <ul>
                            @foreach($goals as $goal)
                            <li>
                                {{ $goal->title ?? $goal->description }}
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <ul>
                            <li>تصحيح تلاوة القرآن الكريم</li>
                            <li>تحفيظ القرآن الكريم</li>
                            <li>العناية بتعليم وتجويد القرآن الكريم</li>
                            <li>التعليم المتخصص لتلاوة وتحفيظ القرآن الكريم للفئات الاجتماعية</li>
                            <li>إعداد المعلمين والمعلمات للعمل في حلقات القرآن الكريم</li>
                            <li>التأهيل الفني للمشرفين والمشرفات على حلقات القرآن الكريم</li>
                        </ul>
                        @endif
                    </div>

                </div>

                <div class="tab-pane" id="tab2">
                    <h2>الهيكل التنظيمي</h2>
                    <div class="hikal">
                        @if(get_setting('organizational_structure_image'))
                        <img src="{{ asset(get_setting('organizational_structure_image')) }}" class="img-fluid" alt="الهيكل التنظيمي" />
                        @else
                        <img src="{{ asset('frontend/assets/img/team.png') }}" class="img-fluid" alt="الهيكل التنظيمي" />
                        @endif
                    </div>

                </div>

                <div class="tab-pane" id="tab3">
                    <h2>اللجنة التنفيذية</h2>
                    <p>{!! get_setting('executive_committee_text', 'محتوى اللجنة التنفيذية...') !!}</p>
                </div>

                <div class="tab-pane" id="tab4">
                    <h2>لجنة الاستدامة المالية</h2>
                    <p>{!! get_setting('financial_sustainability_committee_text', 'محتوى لجنة الاستدامة...') !!}</p>
                </div>

                <div class="tab-pane" id="tab5">
                    <h2>فريق العمل</h2>

                    <div class="team-section py-5">
                        <div class="container">


                            <div class="row g-4 justify-content-center">
                                @if($teams && $teams->count() > 0)
                                @foreach($teams as $team)
                                <div class="col-md-6 col-lg-4">
                                    <div class="team-card animate-up">
                                        <div class="team-img">
                                            @if($team->image)
                                            <img src="{{ $team->image->getUrl() }}" alt="{{ $team->name }}">
                                            @else
                                            <img src="{{ asset('frontend/assets/img/team1.png') }}" alt="{{ $team->name }}">
                                            @endif
                                        </div>
                                        <h4 class="team-name">{{ $team->name }}</h4>
                                        <p class="team-role">{{ $team->position }}</p>
                                        @if($team->description)
                                        <p class="team-text">{{ $team->description }}</p>
                                        @endif
                                    </div>
                                </div>
                                @endforeach

                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
@endsection
