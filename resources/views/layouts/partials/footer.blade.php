<!-- footer start from here -->
<footer class="at-main-footer at-over-layer-black">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="at-footer-about-col at-col-default-mar">
                    <div class="at-footer-logo">
                        <img src="{{asset('app-assets/images/footer-logo.png')}}" alt="">
                    </div>
                    <hr>
                    <p style="text-align: justify" class="footer_paragraph">{{ trans('homy_trans.footer_word')}}</p>
                    <div class="at-social">
                        <?php
                            // $whatsapp = \App\Models\Social::where('type', 'What\'s App')->where('status', '1')->first();
                            $YouTube    = \App\Models\Social::where('type', 'YouTube')->where('status', '1')->first();
                            $Twitter    = \App\Models\Social::where('type', 'Twitter')->where('status', '1')->first();
                            $Facebook   = \App\Models\Social::where('type', 'Facebook')->where('status', '1')->first();
                            $Instagram  = \App\Models\Social::where('type', 'Instagram')->where('status', '1')->first();
                            $G_Mail     = \App\Models\Social::where('type', 'G_Mail')->where('status', '1')->first();
                            $Yahoo      = \App\Models\Social::where('type', 'Yahoo')->where('status', '1')->first();
                            $Telegram   = \App\Models\Social::where('type', 'Telegram')->where('status', '1')->first();
                            $Linked     = \App\Models\Social::where('type', 'Linked In')->where('status', '1')->first();
                        ?>
                        {{-- <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> --}}

                        @if ($YouTube)
                            <a href="{{ $YouTube->name }}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        @endif
                        @if ($Facebook)
                            <a href="{{ $Facebook->name }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
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
                        @if ($Yahoo)
                            <a href="{{ $Yahoo->name }}" target="_blank"><i class="fa fa-yahoo" aria-hidden="true"></i></a>
                        @endif
                        @if ($G_Mail)
                            <a href="{{ $G_Mail->name }}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        @endif
                    </div>

                    <div class="col-md-4 text-center mb-4 mb-md-0 work_time">
                        <hr>
                        <a>
                            <i class="fas fa-clock text-9 text-color-light mb-3 mt-2"></i>
                             <p class="mb-0">
                                <strong>{{ trans('front_trans.times_of_work') }}</strong>
                                <?php  $work_times = \App\Models\Work_Time::all(); ?>
                                <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                     @foreach ($work_times as $work)
                                        {{ trans('front_trans.From' )}} {{ trans('front_trans.'.$work->start_day )}} {{ trans('front_trans.To' )}} {{ trans('front_trans.'.$work->end_day )}} <br>
                                        {{ trans('front_trans.From' )}} {{date('H:i a', strtotime($work->start_time)) }} {{ trans('front_trans.To' )}} {{date('H:i a', strtotime($work->end_time)) }}
                                     @endforeach
                                 </span>
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="at-footer-link-col at-col-default-mar">
                    <h4>{{ trans('homy_trans.Quick links') }}</h4>
                    {{-- <div class="at-heading-under-line">
                        <div class="at-heading-inside-line"></div>
                    </div> --}}
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('front_trans.home') }}</a>
                        </li>
                        <li><a href="/home/about">{{ trans('front_trans.aboutus') }}</a>
                        </li>
                        <li><a href="{{ route('/home/all_property') }}">{{ trans('homy_trans.PROPERTY') }}</a>
                        </li>
                        <li><a href="{{ route('/home/agents') }}">{{ trans('homy_trans.agents') }}</a>
                        </li>
                        <li><a href="{{ route('/home/show_jobs') }}">{{ trans('front_trans.jobs') }}</a>
                        </li>
                        <li><a href="{{ route('/home/news') }}">{{ trans('front_trans.news') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="at-footer-gallery-col at-col-default-mar">
                    <h4>{{ trans('homy_trans.Awesome Gallery') }}</h4>
                    {{-- <div class="at-heading-under-line">
                        <div class="at-heading-inside-line"></div>
                    </div> --}}
                    <div class="at-gallery clearfix">
                        <!--portfolio single img end-->
                        <?php  $gallaries = App\Models\Gallery::orderBy('id', 'desc')->paginate(9);  ?>
                        <ul>
                            @foreach ($gallaries as $gallery)
                                <li>
                                    <a class="thumbnail gallery" href="{{ url($gallery->path)}}">
                                        <img src="{{ url($gallery->path)}}" alt="">
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

<!-- Copyright start from here -->
<section class="at-copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright ©2021 <a href="https://m.facebook.com/mohamed.farh.906?ref=bookmarks" target="_blank">MOHAMED FARH</a> All Rights
                    Reserved</p>
            </div>
        </div>
    </div>
</section>
<!-- Copyright end -->
