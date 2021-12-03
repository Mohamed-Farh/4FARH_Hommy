<!DOCTYPE html>
<html>

<head>
    <title>{{ trans('main_trans.gallery') }}</title>
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
                        <h2>{{ trans('main_trans.gallery') }}</h2>
                        <p><a href="/home">{{ trans('front_trans.home') }}</a>
                            @if (App::getLocale() == 'en')
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            @endif
                            <a>{{ trans('main_trans.gallery') }}</a>
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




    <!-- Blog start from here -->
    <section class="at-blog-sec">
        <div class="container">
            <div class="row">

                @foreach ($gallaries as $gallery)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="at-blog-box at-col-default-mar">
                            <div class="at-blog-img">
                                <a class="thumbnail gallery" href="{{ url($gallery->path)}}">
                                    <img src="{{ url($gallery->path)}}" alt="" style="height: 300px">
                                </a>
                                {{-- <img src="{{ url($gallery->path)}}" alt="" class="gallary_image" > --}}
                                <div class="at-blog-date">
                                    <ul>
                                        <li class="center"><i class="icofont icofont-calendar"></i><a >{{ $gallery->created_at->toFormattedDateString() }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="at-pagination">
                {{ $gallaries->links() }}
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
