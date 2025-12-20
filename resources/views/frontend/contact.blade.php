@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.header',['title' => 'تواصل معنا'])

    <section class="page-content">

        <div class="contact-form">
            <h3>تواصل معنا</h3>

            <form method="POST" action="{{ route('frontend.contact.store') }}">
                @csrf
                
                <div class="input-group">
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="الاسم الكامل" required>
                </div>
                @error('name')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px; margin-bottom: 10px;">{{ $message }}</span>
                @enderror

                <div class="input-group">
                    <span class="icon"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required>
                </div>
                @error('email')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px; margin-bottom: 10px;">{{ $message }}</span>
                @enderror

                <div class="input-group">
                    <span class="icon"><i class="fas fa-phone"></i></span>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="رقم الهاتف">
                </div>
                @error('phone')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px; margin-bottom: 10px;">{{ $message }}</span>
                @enderror

                <div class="input-group textarea-group">
                    <span class="icon"><i class="fas fa-comment"></i></span>
                    <textarea name="message" placeholder="رسالتك" required>{{ old('message') }}</textarea>
                </div>
                @error('message')
                    <span class="error-message" style="color: red; font-size: 14px; display: block; margin-top: 5px; margin-bottom: 10px;">{{ $message }}</span>
                @enderror

                <button type="submit" class="btn-submit">إرسال</button>
            </form>
        </div>



        <div class="container">
            <section class=" container mb-5">
                <div class="row">
                    <div class="col-lg-4 mb-3">

                        <div class="card h-about-block text-center p-3  h-100">
                            <div class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-plus-icon lucide-map-pin-plus"><path d="M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738" /><circle cx="12" cy="10" r="3" /><path d="M16 18h6" /><path d="M19 15v6" /></svg> </div>
                            <h5>الموقع</h5>

                            <div class="decoreTop"></div>
                            <p><a href="#">{{ get_setting('address', 'حي الياسمين - جده - المملكة العربية السعودية') }}</a></p>
                            <div class="decoreBottom"></div>
                        </div>
                    </div>


                    <div class="col-lg-4 mb-3">

                        <div class="card h-about-block text-center p-3  h-100">
                            <div class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg> </div>
                            <h5>الهاتف</h5>

                            <div class="decoreTop"></div>
                            <p style="direction:ltr;"><a href="tel:{{ get_setting('mobile', '') }}">{{ get_setting('phone', '+966 57 878 2178') }}</a></p>
                            <div class="decoreBottom"></div>
                        </div>
                    </div>



                    <div class="col-lg-4 mb-3">

                        <div class="card h-about-block text-center p-3  h-100">
                            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" /><rect x="2" y="4" width="20" height="16" rx="2" /></svg> </div>
                            <h5>البريد الإلكتروني</h5>

                            <div class="decoreTop"></div>
                            <p> <a href="mailto:{{ get_setting('email', '') }}">{{ get_setting('email', 'info@bnan-sa.com') }}</a></p>
                            <div class="decoreBottom"></div>
                        </div>
                    </div>
                </div>
            </section>

        </div>




    </section>
@endsection
