<div id="preloader"></div>
<!-- Main Heder Start -->
<section class="at-main-herader-sec">
    <!-- Header top start -->
    <div class="at-header-topbar">
        <div class="container">
            <div class="row">
                <?php
                    $whatsapp = \App\Models\Social::where('type', 'What\'s App')->where('status', '1')->first();
                    $YouTube    = \App\Models\Social::where('type', 'YouTube')->where('status', '1')->first();

                    $Twitter    = \App\Models\Social::where('type', 'Twitter')->where('status', '1')->first();
                    $Facebook   = \App\Models\Social::where('type', 'Facebook')->where('status', '1')->first();
                    $Instagram  = \App\Models\Social::where('type', 'Instagram')->where('status', '1')->first();
                    $G_Mail     = \App\Models\Social::where('type', 'G_Mail')->where('status', '1')->first();
                    $Yahoo      = \App\Models\Social::where('type', 'Yahoo')->where('status', '1')->first();
                    $Telegram   = \App\Models\Social::where('type', 'Telegram')->where('status', '1')->first();
                    $Linked     = \App\Models\Social::where('type', 'Linked In')->where('status', '1')->first();
                ?>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    @if ($whatsapp)
                        <p><i class="icofont icofont-ui-head-phone"></i>{{ $whatsapp->name }}</p>
                    @endif
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    @if ($G_Mail)
                        <p class="at-respo-right"><i class="icofont icofont-email"></i> <a href="{{ $G_Mail->name }}">{{ $G_Mail->name }}</a>
                        </p>
                    @endif
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="at-social text-right">
                        @if ($Facebook)
                            <a href="{{ $Facebook->name }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        @endif
                        @if ($YouTube)
                            <a href="{{ $YouTube->name }}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        @endif
                        @if ($Twitter)
                            <a href="{{ $Twitter->name }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        @endif
                        @if ($Linked)
                            <a href="{{ $Linked->name }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        @endif
                        @if ($Instagram)
                            <a href="{{ $Instagram->name }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        @endif
                        @if ($Telegram)
                            <a href="{{ $Telegram->name }}" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                        @endif
                        {{-- @if ($Yahoo)
                            <a href="{{ $Yahoo->name }}"><i class="fa fa-yahoo" aria-hidden="true"></i></a>
                        @endif --}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 col-sm-6">
                    <div class="at-sign-in-up clearfix">
                        @guest
                            <p><i class="icofont icofont-sign-in"></i> <a href="{{ route('/sign_in__up') }}"> {{ trans('homy_trans.Sign In') }}</a>
                            </p>
                            <p><i class="icofont icofont-pencil-alt-2"></i> <a href="{{ route('/sign_in__up') }}"> {{ trans('homy_trans.Sign Up') }}</a>
                            </p>
                        @endguest

                        @auth
                            <p><i class="icofont icofont-sign-in"></i> <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"> {{ trans('homy_trans.Log Out') }}</a></p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header top end -->

    <!-- Header navbar start -->
    <div class="at-navbar fixed-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-6">
                    <div class="main-logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('app-assets/images/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-6 col-6">
                    <div id="main-nav" class="stellarnav">
                        <ul>

                            <li><a href="{{ route('home') }}">{{ trans('front_trans.home') }}</a></li>
                            {{-- <li><a href="{{ route('/home/all_property') }}">{{ trans('homy_trans.PROPERTY') }}</a></li> --}}

                            <li class="menu-item-has-children"><a href="#">{{ trans('homy_trans.PROPERTY') }} <i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                                <ul>
                                    <li><a href="{{ route('/home/all_property') }}">{{ trans('homy_trans.PROPERTY') }}</a>
                                    </li>
                                    <li><a href="{{ route('/home/previous_property') }}">{{ trans('homy_trans.previous_property') }}</a>
                                    </li>
                                    <li><a href="{{ route('/home/available_property') }}">{{ trans('homy_trans.available_property') }}</a>
                                    </li>
                                    {{-- <li><a href="properties-left-sidebar.html">Properties left sidebar</a>
                                    </li>
                                    <li><a href="properties-details.html">Properties details</a>
                                    </li> --}}
                                </ul>
                            </li>

                            <li><a href="/home/about">{{ trans('front_trans.aboutus') }}</a></li>

                            <li><a href="{{ route('/home/agents') }}">{{ trans('homy_trans.agents') }}</a></li>

                            <li><a href="{{ route('/home/show_gallary') }}">{{ trans('main_trans.gallery') }}</a></li>

                            <li><a href="{{ route('/home/show_jobs') }}">{{ trans('front_trans.jobs') }}</a></li>

                            <li><a href="{{ route('/home/news') }}">{{ trans('front_trans.news') }}</a></li>


                            <li><a href="{{ route('/home/contact') }}">{{ trans('homy_trans.contact') }}</a></li>

                            <li class="menu-item-has-children">
                                <a class="nav-link link-pages dropdown-toggle link-page" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    >
                                    @if (App::getLocale() == 'ar')
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="" style=" width: 24px;">
                                    @else
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="" style=" width: 24px;">
                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                            style="color:black !important; ">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{-- @guest
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 fbar" style="display: grid; align-items: center">
                            <div class="col">
                                <a class="nav-link link-pages dropdown-toggle link-page" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="padding-top: 0px;">
                                    @if (App::getLocale() == 'ar')
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                                    @else
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                            style="color:black !important; ">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endguest --}}
                </div>

            </div>
        </div>
    </div>
    <!-- Header navbar end -->
</section>
<!-- Main Heder End -->
