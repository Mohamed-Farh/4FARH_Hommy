<!DOCTYPE html>
<html lang="en">

 	<head>
        <title>Sign In/Up</title>
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
                            <h2>{{ trans('homy_trans.ACCOUNT') }}</h2>
                            <p><a href="/home">{{ trans('front_trans.home') }}</a>
                                @if (App::getLocale() == 'en')
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                @endif
                                <a href="{{ route('/sign_in__up') }}">{{ trans('homy_trans.ACCOUNT') }}</a>
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

        <!-- Account start from here -->
        <section class="at-account-sec">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ trans('homy_trans.Sign In') }}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{ trans('homy_trans.Sign Up') }}</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content" id="myTabContent">
                                <div role="tabpanel" class="tab-pane fade show active" id="home">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                            <input id="email" type="email" placeholder="User Email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <input id="password" type="password"  placeholder="Password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="checkbox clearfix">
                                                <label class="pull-left">
                                                    <input type="checkbox"> {{ trans('homy_trans.Remember Me') }}
                                                </label>
                                                <p class="pull-right"><a href="#">{{ trans('homy_trans.Forgot Your Psassword ?') }}</a>
                                                </p>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-default hvr-bounce-to-right" type="submit">{{ trans('homy_trans.Sign In') }}</button>
                                            </div>
                                    </form>
                                </div>


                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    {{-- <form>
                                        <input type="text" class="form-control" placeholder="First Name">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                        <input type="text" class="form-control" placeholder="Username">
                                        <input type="email" class="form-control" placeholder="Your Email Address">
                                        <input type="password" class="form-control" placeholder="Password">
                                        <input type="password" class="form-control" placeholder="Confirm Password">
                                        <div class="text-center">
                                            <button class="btn btn-default hvr-bounce-to-right" type="submit">sing up</button>
                                        </div>
                                    </form> --}}

                                    <form method="POST" action="{{ route('register') }}"enctype="multipart/form-data"
                                                autocomplete="off">
                                            @csrf
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ trans('homy_trans.User Name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="{{ trans('users_trans.email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ trans('users_trans.password') }}">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ trans('users_trans.confirm_password') }}">

                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="text-center">
                                                <button class="btn btn-default hvr-bounce-to-right" type="submit">{{ trans('homy_trans.Sign Up') }}</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End -->





        @include('layouts.partials.footer')
        @include('layouts.partials.footer-scripts')

    </body>
    {{-- @jquery --}}
    @toastr_js
    @toastr_render

</html>
