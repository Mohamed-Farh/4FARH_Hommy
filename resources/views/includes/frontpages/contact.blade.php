<!DOCTYPE html>
<html>

<head>
    <title>{{ trans('main_trans.contact') }}</title>
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
                        <h2>{{ trans('main_trans.contact') }}</h2>
                        <p><a href="/home">{{ trans('front_trans.home') }}</a>
                            @if (App::getLocale() == 'en')
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            @endif
                            <a href="{{ route('/home/contact') }}">{{ trans('main_trans.contact') }}</a>
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
                        {!! Form::open(['route' => 'contactus/send_message', 'method' => 'post']) !!}

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

                        {!! Form::close() !!}
                    </div>
                </div>




                <?php
                    $customers = \App\Models\Social::where('type', 'Customers Service')->get();
                    $inquiries = \App\Models\Social::where('type', 'Inquiries')->get();
                    $accounts = \App\Models\Social::where('type', 'Accounts')->get();
                    $recruitments = \App\Models\Social::where('type', 'Recruitment')->get();
                ?>
                <div class="col-md-6">

                    <div class="at-info-box at-col-default-mar">
                        <h4 style="color: #D19200;"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px;"></i> {{ trans('contactus_trans.customers_service') }} </h4>
                        @foreach ($customers as $customer)
                            @if ($customer->status == '1')
                                <p>{{ $customer->name }}</p>
                            @endif
                        @endforeach
                    </div>

                    <div class="at-info-box at-col-default-mar">
                        <h4 style="color: #D19200;"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 20px;"></i> {{ trans('contactus_trans.inquiries') }} </h4>
                        @foreach ($inquiries as $inquirie)
                            @if ($inquirie->status == '1')
                                <p>{{ $inquirie->name }}</p>
                            @endif
                        @endforeach
                    </div>

                    <div class="at-info-box at-col-default-mar">
                        <h4 style="color: #D19200;"><i class="fa fa-calculator" aria-hidden="true" style="font-size: 20px;"></i> {{ trans('contactus_trans.accounts') }} </h4>
                        @foreach ($accounts as $account)
                            @if ($account->status == '1')
                                <p>{{ $account->name }}</p>
                            @endif
                        @endforeach
                    </div>

                    <div class="at-info-box at-col-default-mar">
                        <h4 style="color: #D19200;"><i class="fa fa-user" aria-hidden="true" style="font-size: 20px;"></i> {{ trans('contactus_trans.recruitment') }} </h4>
                        @foreach ($recruitments as $recruitment)
                            @if ($recruitment->status == '1')
                                <p>{{ $recruitment->name }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Contact end-->
    <?php
        $company_locations = \App\Models\Company_Location::first();
    ?>

    @if ($company_locations)
        <!--start map section-->
        <div id="googleMap" style="width:100%; height:400px;">
            <iframe
                src="{{ $company_locations->map_frame }}"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
        <!--end map section-->
    @endif




    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

    @if ($company_locations)
        <!-- Google map -->
        <script type="text/javascript" src="{{ asset('app-assets/js/google-map.js')}}"></script>
        <script src="{{ $company_locations->map_frame }}"></script>
     @endif

</body>
{{-- @jquery --}}
@toastr_js
@toastr_render

</html>
