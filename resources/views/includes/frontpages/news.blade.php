<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
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
                        <h2>{{ trans('front_trans.news') }}</h2>
                        <p><a href="/home">{{ trans('front_trans.home') }}</a>
                            @if (App::getLocale() == 'en')
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            @endif
                            <a href="{{ route('/home/contact') }}">{{ trans('front_trans.news') }}</a>
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



                @foreach ($news as $new )
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="at-blog-box at-col-default-mar">
                            <div class="at-blog-img">
                                @if($new->photo)
                                    <img src="{{url('image/news/'.$new->photo)}}" style="height: 250px">
                                @else
                                    <img src="{{url('image/news/default.jpg')}}">
                                @endif
                                <div class="at-blog-date">
                                    <ul>
                                        <li class="center"><i class="icofont icofont-calendar"></i><a >{{ $new->created_at->toFormattedDateString() }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="at-blog-content">
                                <h4><a href="/show_news/{{ $new->head_en }}">
                                    @if (App::getLocale() == 'en')
                                        @if ($new->head_en !='')
                                            {{ \Str::limit($new->head_en,80)}}
                                        @else
                                            {{ \Str::limit($new->head_ar,80)}}
                                        @endif
                                    @else
                                        {{ \Str::limit($new->head_ar,80)}}
                                    @endif
                                </a></h4>
                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($new->body_en !='')
                                            {{ \Str::limit($new->body_en,150)}}
                                        @else
                                            {{ \Str::limit($new->body_ar,150)}}
                                        @endif
                                    @else
                                        {{ \Str::limit($new->body_ar,150)}}
                                    @endif
                                </p>
                                <a href="/show_news/{{ $new->head_en }}" style="text-align: center">{{ trans('front_trans.show_details') }}<i class="zmdi zmdi-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="at-pagination">
                {{ $news->links() }}
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
