<!DOCTYPE html>
<html>

<head>
    <title>{{ trans('front_trans.jobs') }}</title>
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
                        <h2>{{ trans('front_trans.jobs') }}</h2>
                        <p><a href="/home">{{ trans('front_trans.home') }}</a>
                            @if (App::getLocale() == 'en')
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            @endif
                            <a href="{{ route('/home/contact') }}">{{ trans('front_trans.jobs') }}</a>
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




    <!-- Contact Start from here -->
    <section class="at-contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="at-contact-form at-col-default-mar">
                        <div id="form-messages "></div>
                        {{-- {!! Form::open(['route' => 'contactus/send_message', 'method' => 'post']) !!}

                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('contactus_trans.Name')]) !!}
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror

                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('contactus_trans.email')]) !!}
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror

                            {!! Form::text('mobile', old('mobile'), ['class' => 'form-control', 'placeholder' => trans('front_trans.mobile')]) !!}
                            @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror

                            {!! Form::text('subject', old('subject'), ['class' => 'form-control', 'placeholder' => trans('contactus_trans.subject')]) !!}
                            @error('subject')<span class="text-danger">{{ $message }}</span>@enderror

                            {!! Form::textarea('message', old('message'), ['class' => 'form-control', 'placeholder' => trans('contactus_trans.message')]) !!}
                            @error('message')<span class="text-danger">{{ $message }}</span>@enderror

                            {!! Form::button(trans('contactus_trans.send_message'), ['class' => 'btn btn-default hvr-bounce-to-right', 'type' => 'submit']) !!}

                        {!! Form::close() !!} --}}



                            {!! Form::open(['route' => 'jobs/send_cv', 'method' => 'post', 'files'=>true ]) !!}

                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('contactus_trans.Name')]) !!}

                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror

                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('contactus_trans.email')]) !!}
                                {!! Form::text('mobile', old('mobile'), ['class' => 'form-control', 'placeholder' => trans('front_trans.mobile')]) !!}

                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror

                                {!! Form::text('job_title', old('job_title'), ['class' => 'form-control', 'placeholder' => trans('contactus_trans.subject')]) !!}
                                @error('job_title')<span class="text-danger">{{ $message }}</span>@enderror

                                {!! Form::file('file',['class' => 'form-control', 'placeholder' => trans('contactus_trans.message')]) !!}
                                @error('file')<span class="text-danger">{{ $message }}</span>@enderror

                                {!! Form::button(trans('contactus_trans.send_message'), ['class' => 'btn btn-default hvr-bounce-to-right', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>




                <?php
                    $annoncements = \App\Models\Company_Job::where('type', 'Annoncement')->get();
                    $job_titles   = \App\Models\Company_Job::where('type', 'Job Title')->get();
                    $job_emails   = \App\Models\Company_Job::where('type', 'Job E-Mail')->get();
                ?>
                <div class="col-md-6">

                    <div class="at-info-box at-col-default-mar">
                        <h4 style="color: #D19200;"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px;"></i>{{ trans('front_trans.jobs') }} </h4>
                        @foreach ($annoncements as $annoncement )
                            @if ($annoncement->status =='0')
                                <div class="line line-4"></div>
                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($annoncement->title_en !='')
                                            <th>{{ \Str::limit($annoncement->title_en,100)}}</th>
                                        @else
                                            <th>{{ \Str::limit($annoncement->title_ar,100)}}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($annoncement->title_ar,100)}}</th>
                                    @endif
                                </p>
                            @endif
                        @endforeach
                    </div>

                    <div class="at-info-box at-col-default-mar">
                        <h4 style="color: #D19200;"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 20px;"></i> {{ trans('front_trans.available_jobs') }} </h4>
                        @foreach ($job_titles as $job_title )
                            @if ($job_title->status =='0')

                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($job_title->title_en !='')
                                            <th>{{ \Str::limit($job_title->title_en,100)}}</th>
                                        @else
                                            <th>{{ \Str::limit($job_title->title_ar,100)}}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($job_title->title_ar,100)}}</th>
                                    @endif
                                </p>
                            @endif
                        @endforeach
                    </div>

                    <div class="at-info-box at-col-default-mar">
                        <h4 style="color: #D19200;"><i class="fa fa-calculator" aria-hidden="true" style="font-size: 20px;"></i> {{ trans('front_trans.job_email') }} </h4>
                        @foreach ($job_emails as $job_email )
                            @if ($job_email->status =='0')

                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($job_email->title_en !='')
                                            <th>{{ \Str::limit($job_email->title_en,100)}}</th>
                                        @else
                                            <th>{{ \Str::limit($job_email->title_ar,100)}}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($job_email->title_ar,100)}}</th>
                                    @endif
                                </p>
                            @endif
                        @endforeach
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Contact end-->




    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>
{{-- @jquery --}}
@toastr_js
@toastr_render

</html>
