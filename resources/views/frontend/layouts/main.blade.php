<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مؤسسة بنان</title>
    <link rel="icon" href="{{ asset('frontend/assets/img/logo-icon.png') }}">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- fancybox -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

</head>
<body>
    <section class="topBar mt-0">
        <div class="topBar-right d-flex">
            <div class="phone"><a href="tel:{{ get_setting('phone') }}"> <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone ">
                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg></span>+{{ get_setting('phone') }} </a></div>
            <div class="social">
                <span><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook-icon lucide-facebook">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" /></svg></a></span>
                <span><a href="{{ get_setting('twitter_url') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter-icon lucide-twitter">
                            <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" /></svg></a></span>
                <span><a href="{{ get_setting('youtube_url') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube-icon lucide-youtube">
                            <path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17" />
                            <path d="m10 15 5-3-5-3z" /></svg></a></span>

                <span><a href="{{ get_setting('instagram_url') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram-icon lucide-instagram">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" /></svg></a></span>
            </div>
        </div>

        {{-- <div class="topBar-left">
            <a data-fancybox data-src="#login-popup" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" /></svg></span> دخول المستخدمين </a>
        </div> --}}
    </section>


    <div style="display:none;" id="login-popup">
        <div class="login-box">
            <h3>تسجيل الدخول</h3>

            <form>

                <div class="input-group">
                    <i class="fa fa-envelope"></i>
                    <input type="email" placeholder="البريد الإلكتروني">
                </div>

                <div class="input-group">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="كلمة المرور">
                </div>

                <button type="submit" class="submit-btn">دخول</button>

                <div class="extra-links">
                    <a href="#" class="forgot">نسيت كلمة المرور؟</a>
                    <a href="register.html" class="new-user">مستخدم جديد؟</a>
                </div>

            </form>
        </div>
    </div>

    <section class="featured-area-two m-0 ">


        <header class="two">

            <div class="top-bar">
                <div class="container" style="position:relative;">
                    <div class="logo-menu">
                        <div class="row align-items-center">
                            <div class="col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('frontend.home') }}">
                                        <img alt="logo" src="{{ asset(get_setting('logo')) }}" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="nav-bar">
                                    <nav>
                                        <ul>
                                            <li><a href="{{ route('frontend.home') }}">الرئيسية</a></li>


                                            <li>
                                                <a href="JavaScript:void(0)"> عن الجمعية</a>
                                                <ul>
                                                    <li><a href="{{ route('frontend.about') }}">معلومات عن بنان </a></li>
                                                    <li><a href="{{ route('frontend.managers') }}"> كلمة رئيس مجلس الإدارة</a></li>
                                                    <li><a href="{{ route('frontend.partners') }}"> الشركاء</a></li>
                                                    <li><a href="{{ route('frontend.awards') }}"> الجوائز</a></li>

                                                    <li><a href="{{ route('frontend.employment') }}"> التوظيف</a></li>
                                                    <li><a href="{{ route('frontend.license') }}">شهادة ترخيص الجمعية </a></li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="JavaScript:void(0)"> الحوكمة </a>
                                                <ul>
                                                    <li><a href="{{ route('frontend.policies') }}">اللوائح والسياسات</a></li>
                                                    <li><a href="{{ route('frontend.reports') }}">التقارير </a></li>

                                                </ul>
                                            </li>



                                            <li><a href="{{ route('frontend.programs.index') }}"> البرامج والمبادرات</a></li>

                                            <li>
                                                <a href=""> المركز الإعلامي</a>
                                                <ul>

                                                    <li><a href="{{ route('frontend.news.index') }}"> الأخبار</a></li>
                                                    <li><a href="{{ route('frontend.media') }}"> مكتبة الوسائط </a></li>

                                                </ul>
                                            </li>

                                            <li><a href="{{ route('frontend.contact') }}">تواصل معنا</a></li>


                                        </ul>
                                    </nav>
                                    <div class="extras">


                                        {{-- <a class="btn btn-full" href="courses.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open-text-icon lucide-book-open-text">
                                                <path d="M12 7v14" />
                                                <path d="M16 12h2" />
                                                <path d="M16 8h2" />
                                                <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z" />
                                                <path d="M6 12h2" />
                                                <path d="M6 8h2" /></svg> &nbsp; منصة التدريب &nbsp; </a> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="responsive-bar">
                <div class="container">
                    <div class="responsive-bar-slider">
                        <a href="{{ route('frontend.home') }}">
                            <img alt="logo" src="{{ asset(get_setting('logo_footer')) }}" class="white-logo">
                            <img alt="logo" src="{{ asset(get_setting('logo_footer')) }}" class="black-logo">
                        </a>
                        <div class="bar-menu">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block; ">
                <div class="res-log">
                    <a href="{{ route('frontend.home') }}">
                        <img src="{{ asset(get_setting('logo_footer')) }}" alt="Responsive Logo" class="white-logo">
                        <img alt="logo" src="{{ asset(get_setting('logo_footer')) }}" class="black-logo">
                    </a>
                </div>
                <ul>

                    <li><a href="{{ route('frontend.home') }}">الرئيسية</a></li>


                    <li class="menu-item-has-children">
                        <a href="JavaScript:void(0)">عن الجمعية </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('frontend.about') }}"> عن الجمعية</a></li>
                            <li><a href="{{ route('frontend.managers') }}"> كلمة رئيس مجلس الإدارة</a></li>
                            <li><a href="{{ route('frontend.partners') }}"> الشركاء</a></li>
                            <li><a href="{{ route('frontend.awards') }}"> الجوائز</a></li>
                            <li><a href="{{ route('frontend.employment') }}"> التوظيف</a></li>
                            <li><a href="{{ route('frontend.license') }}">شهادة ترخيص الجمعية </a></li>

                        </ul>
                    </li>


                    <li class="menu-item-has-children">
                        <a href="JavaScript:void(0)">الحوكمة </a>

                        <ul class="sub-menu">

                            <li><a href="{{ route('frontend.policies') }}">اللوائح والسياسات</a></li>
                            <li><a href="{{ route('frontend.reports') }}">التقارير </a></li>

                        </ul>

                    </li>
                    <li><a href="{{ route('frontend.programs.index') }}"> البرامج والمبادرات</a></li>

                    <li class="menu-item-has-children">
                        <a href="JavaScript:void(0)">المركز الإعلامي</a>

                        <ul class="sub-menu">

                            <li><a href="{{ route('frontend.news.index') }}"> الأخبار</a></li>
                            <li><a href="{{ route('frontend.media') }}"> مكتبة الوسائط </a></li>

                        </ul>

                    </li>

                    <li><a href="{{ route('frontend.contact') }}">تواصل معنا</a></li>

                    <li><a href="courses.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open-text-icon lucide-book-open-text">
                                <path d="M12 7v14" />
                                <path d="M16 12h2" />
                                <path d="M16 8h2" />
                                <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z" />
                                <path d="M6 12h2" />
                                <path d="M6 8h2" /></svg> &nbsp; منصة التدريب &nbsp; </a> </li>

                </ul>

                <a href="JavaScript:void(0)" id="res-cross"></a>
            </div>
        </header>

        @yield('content')

    </section>


    <!-- footer -->



    <!-- FOOTER -->



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-about">
                        <img src="{{ asset(get_setting('logo_footer')) }}" class="mb-2" />
                        <p class="just">
                          {!! get_setting('about_text') !!}
                        </p>
                    </div>
                </div>

                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">الرئيسية</a></li>
                            <li><a href="#">عن الجمعية</a></li>
                            <li><a href="#">رسالتنا وأهدافنا</a></li>
                            <li><a href="#">مجلس الإدارة</a></li>
                            <li><a href="#">الحوكمة</a></li>
                            <li><a href="#">الأسئلة الشائعة</a></li>
                            <li><a href="#">برامج تحفيظ القرآن</a></li>
                            <li><a href="#">الحلقات والدورات</a></li>
                            <li><a href="#">التسجيل في الحلقات</a></li>
                            <li><a href="{{ route('frontend.news.index') }}">آخر الأخبار</a></li>
                            <li><a href="{{ route('frontend.programs.index') }}">المبادرات</a></li>
                            <li><a href="#">المركز الإعلامي</a></li>

                        </ul>
                    </div>
                    <div>

                    </div>
                </div>



                <div class="col-md-4">
                    <div class="footer-contact">
                        <ul>
                            <li><a href=""><span><i class="fa-brands fa-x-twitter"></i></span>{{ get_setting('twitter_url') }}</a></li>
                            <li><a href=""><span><i class="fa-solid fa-mobile-screen"></i></span>{{ get_setting('mobile') }}</a></li>
                            <li><a href=""><span><i class="fa-regular fa-envelope"></i></span>{{ get_setting('email') }}</a></li>
                            <li><a href=""><span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                            <circle cx="12" cy="10" r="3" /></svg></span></a>{{ get_setting('address') }}</li>
                            <li><a href=""><span></span></a>{{ get_setting('bank_account_1') }}</li>
                            <li><a href=""><span></span></a>{{ get_setting('bank_account_2') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />

            <div class="footer-bottom">
                <div class="social">
                    تــابعنــا:
                    <span><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook-icon lucide-facebook">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" /></svg></a></span>
                    <span><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter-icon lucide-twitter">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" /></svg></a></span>

                    <span><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram-icon lucide-instagram">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" /></svg></a></span>
                    <span><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube-icon lucide-youtube">
                                <path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17" />
                                <path d="m10 15 5-3-5-3z" /></svg></a></span>

                </div>
                <div class="copyrights">
                    Copyright © 2025 · Banan - Developed by <a href="#">Takamol</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <!-- Back to top button -->
    <a id="button"></a>
    <!-- Back to top button end -->
    <!-- jQuery -->
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/odometer.js') }}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        setTimeout(function() {
            odometer.innerHTML = jQuery('.odometer1').data("id");
            odometer2.innerHTML = jQuery('.odometer2').data("id");
            odometer3.innerHTML = jQuery('.odometer3').data("id");
        }, 2000);

    </script>
    <!-- fancybox -->
    <script src="{{ asset('frontend/assets/js/jquery.fancybox.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    @include('sweetalert::alert')
    @yield('scripts')



</body>
