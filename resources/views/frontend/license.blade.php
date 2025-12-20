@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'شهادة ترخيص الجمعية'])
    <section class="page-content">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inside study-block">
                        <div class="certificate"><img src="{{ asset(get_setting('license_certificate_image')) }}" class="img-fluid " /></div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
