@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'التوظيف'])

<section class="page-content">

    <section class="career-form-section">
        <h2>نموذج التقديم</h2>

        <form class="career-form" method="POST" action="{{ route('frontend.employment.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>الاسم الكامل</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="اكتب اسمك هنا" required>
                @error('name')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="example@mail.com" required>
                @error('email')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>رقم الجوال</label>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="05xxxxxxxx" required>
                @error('phone')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>الوظيفة المتقدم لها</label>
                <select name="job_id" required>
                    <option value="">اختر الوظيفة</option>
                    @if($jobs && $jobs->count() > 0)
                        @foreach($jobs as $job)
                            <option value="{{ $job->id }}" {{ old('job_id') == $job->id ? 'selected' : '' }}>{{ $job->title }}</option>
                        @endforeach
                    @endif
                </select>
                @error('job_id')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>اكتب نبذة عن خبراتك</label>
                <textarea name="brief" placeholder="خبراتك ومهاراتك...">{{ old('brief') }}</textarea>
                @error('brief')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>ارفع سيرتك الذاتية (PDF)</label>
                <input type="file" name="cv" accept="application/pdf" required>
                @error('cv')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-full w-100">إرسال الطلب</button>
        </form>
    </section>



</section>
@endsection
