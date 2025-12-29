@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'كلمة رئيس مجلس الإدارة'])
<section class="page-content">


    <section class="chairman-section">
        <div class="chairman-container">

            <!-- صورة الرئيس -->
            <div class="chairman-image">
                @if(get_setting('chairman_image'))
                <img src="{{ asset(get_setting('chairman_image')) }}" alt="رئيس مجلس الإدارة">
                @else
                <img src="{{ asset('frontend/assets/img/chairman.png') }}" alt="رئيس مجلس الإدارة">
                @endif
            </div>

            <!-- نص الكلمة -->
            <div class="chairman-text">
                <h1>كلمة رئيس مجلس الإدارة</h1>
                @if(get_setting('chairman_message'))
                <div class="chairman-message">
                    {!! (get_setting('chairman_message')) !!}
                </div>
                @endif
                <p class="chairman-name">
                    @if(get_setting('chairman_name'))
                    — {{ get_setting('chairman_name') }}
                    @else
                    — رئيس مجلس الإدارة
                    @endif
                </p>
            </div>

        </div>
    </section>



</section>


@endsection
