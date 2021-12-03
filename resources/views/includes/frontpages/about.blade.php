<!DOCTYPE html>
<html>

<head>
    <title>{{ trans('front_trans.aboutus') }}</title>
    @include('layouts.partials.head')
    @toastr_css
</head>

<body>
    @include('layouts.partials.nav')
    <div class="row">
        <div class="col-12">
            @include('layouts.partials.flash')
        </div>
    </div>



    <!-- Inner page heading start from here -->
    <section id="at-inner-title-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="at-inner-title-box">
                        <h2>{{ trans('front_trans.aboutus') }}</h2>
                        <p><a href="/home">{{ trans('front_trans.home') }}</a>
                            @if (App::getLocale() == 'en')
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            @endif
                            <a href="#">{{ trans('front_trans.aboutus') }}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <img src="{{ asset('app-assets/images/title.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Inner page heading end -->

    <!-- About start from here -->
    <section class="at-about-sec">
        <div class="container justify-content-center">
            <div class="row animatedParent animateOnce">
                <div class="col-xl-7 col-lg-6 col-md-12">
                    <div class="at-about-col at-col-default-mar">
                        <div class="at-about-title">
                            <h1>{{ trans('homy_trans.Few-description') }}<br> <span>{{ trans('homy_trans.single_title') }}</span></h1>
                            <h6>{{ trans('homy_trans.real-estate') }}</h6>
                        </div>
                        <?php  $aboutus = \App\Models\Front\Aboutus::first(); ?>
                        @if ($aboutus)
                            <p>
                                @if (App::getLocale() == 'en')
                                    @if ($aboutus->aboutus_en != '')
                                        <td>{{ strip_tags($aboutus->aboutus_en) }}</td>
                                    @else
                                        <td>{{ strip_tags($aboutus->aboutus_ar) }}</td>
                                    @endif
                                @else
                                    @if ($aboutus->aboutus_ar != '')
                                        <td>{{ strip_tags($aboutus->aboutus_ar) }}</td>
                                    @else
                                        <td>{{ strip_tags($aboutus->aboutus_en) }}</td>
                                    @endif
                                @endif
                            </p>
                        @endif

                     </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="at-about-col animated fadeInRightShort slow delay-250">
                        @if (App::getLocale() == 'en')
                            <img src="{{ asset('app-assets/images/about/1.png') }}" alt="">
                        @else
                            <img src="{{ asset('app-assets/images/about/3.png') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->



    <!-- Call start from here -->
    <section class="at-Call-sec jarallax at-over-layer-black">
        <div class="at-Call-both-side clearfix">
            <?php   $about_us= \App\Models\Front\Aboutus::all();   ?>
            @foreach ($about_us as $aboutus)
                <div class="at-Call-right">
                    <div class="at-Call-right-inside">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <h4 style="color: white">{{ trans('front_trans.experience_year') }}</h4>
                                <div class="at-short-line"></div>
                                <h3 style="margin-bottom:20px;"><span>{{ $aboutus->experience_year }}</span></h3>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <h4 style="color: white">{{ trans('front_trans.previous_project') }}</h4>
                                <div class="at-short-line"></div>
                                <h3 style="margin-bottom:20px;"><span>{{ $aboutus->previous_project }}</span></h3>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <h4 style="color: white">{{ trans('front_trans.under_construction') }}</h4>
                                <div class="at-short-line"></div>
                                <h3 style="margin-bottom:20px;"><span>{{ $aboutus->under_construction }}</span></h3>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <h4 style="color: white">{{ trans('front_trans.client') }}</h4>
                                <div class="at-short-line"></div>
                                <h3><span>{{ $aboutus->client }}</span></h3>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Call End -->




    <!-- Call start from here -->
    <section class="at-plan-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="at-sec-title at-sec-title-left">
                        <h2>{{ trans('front_trans.whyus') }}</h2>
                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                        <p>
                            @if ($aboutus)
                                @if (App::getLocale() == 'en')
                                    @if ($aboutus->whyus_en != '')
                                        {{ $aboutus->whyus_en }}
                                    @else
                                        {{  $aboutus->whyus_ar }}
                                    @endif
                                @else
                                    @if ($aboutus->whyus_ar != '')
                                        {{  $aboutus->whyus_ar }}
                                    @else
                                        {{  $aboutus->whyus_en }}
                                    @endif
                                @endif
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="at-col-default-mar">
                        <img src="{{ asset('app-assets/images/meeting.jpg')}}" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="at-sec-title at-sec-title-left">
                        <h2>{{ trans('front_trans.visions') }}</h2>
                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                        <p>
                            @if( $aboutus)
                                @if (App::getLocale() == 'en')
                                    @if ($aboutus->vision_en != '')
                                        {{ $aboutus->vision_en }}
                                    @else
                                        {{ $aboutus->vision_ar }}
                                    @endif
                                @else
                                    @if ($aboutus->vision_ar != '')
                                        {{ $aboutus->vision_ar }}
                                    @else
                                        {{ $aboutus->vision_en }}
                                    @endif
                                @endif
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="at-col-default-mar">
                        <img src="{{ asset('app-assets/images/meeting.jpg')}}" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="at-sec-title at-sec-title-left">
                        <h2>{{ trans('front_trans.message') }}</h2>
                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                        <p>
                            @if ($aboutus)
                                @if (App::getLocale() == 'en')
                                    @if ($aboutus->message_en != '')
                                        {{ $aboutus->message_en }}
                                    @else
                                    {{  $aboutus->message_ar }}
                                    @endif
                                @else
                                    @if ($aboutus->message_ar != '')
                                        {{ $aboutus->message_ar }}
                                    @else
                                        {{ $aboutus->message_en}}
                                    @endif
                                @endif
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="at-col-default-mar">
                        <img src="{{ asset('app-assets/images/meeting.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call end -->




    <!-- Newsletter start from here -->
    <section class="at-newsletter-sec jarallax at-over-layer-black">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-8">
                    <h2>Subscribe <span>Newsletter</span></h2>
                    <p></p>
                    <form action="{{ route('home/subscribes/send') }}" method="POST" class="input-group">
                            @csrf
                        <input type="email" class="form-control" placeholder="Enter Your Email" name="email" required>

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">SUBSCRIBE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter end -->

    <!-- Brand start from here -->
    <section class="at-brand-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-carousel" data-slick='{"slidesToShow": 6, "slidesToScroll": 1}'>
                        <div class="item">
                            <a href="#"><img src="images/brand/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/3.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/4.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/5.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/6.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand End -->





    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>
{{-- @jquery --}}
@toastr_js
@toastr_render

</html>
