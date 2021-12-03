@extends('layouts.mainlayout')

@section('content')

    <!-- Main Search start from here -->
    <section class="main-search-field main-search-field-two main-search-field-three at-over-layer-black" id="welcome-video">
        <a class="yt-bg-video" data-property="{videoURL:'https://www.youtube.com/watch?v=oIABm5MGcSA',containment:'#welcome-video', showControls:false, autoPlay:true, mute:true, loop:true, startAt:0, quality:'default', opacity:1,}"></a>


        <div class="container">

            {{-- words that will appears in the slider --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="at-col-default-mar clearfix">
                        @if (App::getLocale() == 'en')
                            <h1 id="text-animation">we are real estate company, find your dream home from here, we are very
                                helpful, We are very modern, we are very experienced</h1>
                        @else
                            <h1 id="text-animation">نـحـن شـركـة اسـتـثـمـار عـقـاري, ابـحـث عـن مـنـزل أحـلامـك فـي مـوقـعــنا,
                                 يـمـكـنـك الـتـواصـل مـعـنـا فـي اي وقـت, نـحـن نـتـمـيـز بـالـمـصـداقـيـة,نـحـن نـتـمـيـز بالـجـديـة, نـحـن نـمـتـلـك الـخـبـرة</h1>
                        @endif

                    </div>
                </div>
            </div>

            {{-- search section --}}
            <div class="at-search-box">
                {!! Form::open(['route' => '/home/go_search', 'method' => 'get'], ['class' => 'search-form'] ) !!}
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="at-col-default-mar">
                                {!! Form::text('keyword', old('keyword', request()->input('keyword')), ['class' => 'at-input', 'placeholder' => trans('front_trans.type_word')]) !!}
                            </div>
                        </div>

                        <?php
                            $category_ar = \App\Models\Category::orderBy('id', 'desc')->pluck('name_ar', 'id');
                            $category_en = \App\Models\Category::orderBy('id', 'desc')->pluck('name_en', 'id');
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="at-col-default-mar">
                                @if (App::getLocale() == 'en')
                                    @if ($category_en !='')
                                        {!! Form::select('category_id', ['' => trans('homy_trans.choose_category')] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'div-toggle']) !!}
                                    @else
                                    {!! Form::select('category_id', ['' => trans('homy_trans.choose_category')] + $category_ar->toArray(), old('category_id', request()->input('category_id')), ['class' => 'div-toggle']) !!}
                                    @endif
                                @else
                                    @if ($category_ar !='')
                                    {!! Form::select('category_id', ['' => trans('homy_trans.choose_category')] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'div-toggle']) !!}
                                    @else
                                    {!! Form::select('category_id', ['' => trans('homy_trans.choose_category')] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'div-toggle']) !!}
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12">
                            <div class="at-col-default-mar">
                                {!! Form::hidden('size', trans('front_trans.size'))  !!}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="at-col-default-mar">
                                            {!! Form::text('min_size', old('min_size'), ['class' => 'at-input', 'placeholder' => trans('front_trans.min_size')]) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="at-col-default-mar">
                                            {!! Form::text('max_size', old('max_size'), ['class' => 'at-input', 'placeholder' => trans('front_trans.max_size')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="at-col-default-mar">
                                {!! Form::hidden('price', trans('front_trans.price'))  !!}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="at-col-default-mar">
                                            {!! Form::text('min_price', old('min_price'), ['class' => 'at-input', 'placeholder' => trans('front_trans.min_price')]) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="at-col-default-mar">
                                            {!! Form::text('max_price', old('max_price'), ['class' => 'at-input', 'placeholder' => trans('front_trans.max_price')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="at-col-default-mar">
                                @if (App::getLocale() == 'en')
                                    {!! Form::text('city_en', old('city_en', request()->input('city_en')), ['class' => 'at-input', 'placeholder' => 'Search City Here']) !!}
                                @else
                                    {!! Form::text('city_ar', old('city_ar', request()->input('city_ar')), ['class' => 'at-input', 'placeholder' => 'بحث بالمدينة']) !!}
                                @endif
                            </div>
                        </div>



                        {{-- <div class="col-lg-3 col-md-6">
                            <div class="at-col-default-mar">
                                <div class="at-pricing-range">
                                    <div class="my-info-1">
                                        <div class="acitveon sale hide">
                                            <label>{{ trans('property_trans.Price') }} : </label>
                                                {!! Form::hidden('size', trans('front_trans.size'))  !!}
                                                {!! Form::text('min_size', old('min_size'), ['class' => 'amount at-input-price', 'placeholder' => trans('front_trans.min_size')]) !!}
                                                {!! Form::text('max_size', old('max_size'), ['class' => 'amount at-input-price', 'placeholder' => trans('front_trans.max_size')]) !!}
                                            <div class="slider-range"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="at-col-default-mar">
                                {!! Form::button(trans('front_trans.search_here'), ['class' => 'btn btn-default hvr-bounce-to-right', 'type' => 'submit']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <!-- Main Search End -->




    <!-- About start from here -->
    <section class="at-about-sec">
        <div class="container justify-content-center">
            <div class="row animatedParent animateOnce">
                <div class="col-xl-6 col-lg-6 col-md-12 make_right_ar">
                    <div class="at-about-col at-col-default-mar">
                        <div class="at-about-title">
                            <h1>{{ trans('homy_trans.Few-description') }}<br> <span>{{ trans('homy_trans.single_title') }}</span></h1>
                            <h6>{{ trans('homy_trans.real-estate') }}</h6>
                        </div>
                        <?php $bout_us = \App\Models\Front\Aboutus::all(); ?>
                         @foreach ($bout_us as $aboutus)
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
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6  make_left_ar">
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



    <!-- Property start from here -->
    <section class="at-property-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="at-sec-title at-sec-title-left">
                        <h2>{{ trans('homy_trans.AWESOME') }} <span>{{ trans('homy_trans.PROPERTY') }}</span></h2>
                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                    </div>
                </div>
            </div>


            <?php     $all_properties= \App\Models\Property::orderBy('id', 'desc')->paginate(9);  ?>
            @foreach ($all_properties as $all_property )
                <div class="row animatedParent animateOnce">
                    <div class="col-md-4 col-sm-6">
                        <div class="at-property-item at-col-default-mar animated fadeInUpShort slow">
                            <div class="at-property-img">
                                <img src="{{url('image/photo/'.$all_property->photo)}}" alt="">
                                <div class="at-property-overlayer"></div>
                                <a class="btn btn-default at-property-btn" href="/home/property/{{ $all_property->id }}" role="button">
                                    {{ trans('front_trans.show_details') }}
                                </a>
                                <h4>{{ trans('homy_trans.for'.$all_property->purpose) }}</h4>
                                <h5>${{ $all_property->price }}</h5>
                            </div>
                            <div class="at-property-dis">
                                <ul>
                                    <li><i class="fa fa-object-group" aria-hidden="true"></i> {{ $all_property->size }} sq ft</li>
                                    <li><i class="fa fa-bed" aria-hidden="true"></i> {{ $all_property->bedroom }}</li>
                                    <li><i class="fa fa-bath" aria-hidden="true"></i> {{ $all_property->bathroom }}</li>
                                    <li><i class="fa fa-history" aria-hidden="true"></i> {{ trans('homy_trans.'.$all_property->used) }}</li>
                                </ul>
                            </div>
                            <div class="at-property-location">
                                <h4><i class="fa fa-home" aria-hidden="true"></i><a href="/home/property/{{ $all_property->id }}">
                                        @if (App::getLocale() == 'en')
                                            @if ($all_property->title_en !='')
                                                {{ \Str::limit($all_property->title_en, 25) }}
                                            @else
                                                {{ \Str::limit($all_property->title_ar, 25) }}
                                            @endif
                                        @else
                                            {{ \Str::limit($all_property->title_ar, 25) }}
                                        @endif
                                    </a></h4>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                                     @if (App::getLocale() == 'en')
                                        @if ($all_property->city_en !='')
                                                {{ \Str::limit($all_property->address_en, 25) }}, {{ \Str::limit($all_property->city_en, 25) }}
                                            @else
                                                {{ \Str::limit($all_property->address_ar, 25) }}, {{ \Str::limit($all_property->city_ar, 25) }}
                                            @endif
                                        @else
                                            {{ \Str::limit($all_property->address_ar, 25) }}, {{ \Str::limit($all_property->city_ar, 25) }}
                                        @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 text-center">
                        <a class="btn btn-default hvr-bounce-to-right" href="properties-col-3.html" role="button">
                            {{ trans('homy_trans.show_more') }} </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Property End -->




    <!-- Agents start from here -->
    <section class="at-agents-sec at-agents-sec-two jarallax  at-over-layer-black">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="at-sec-title">
                        @if (App::getLocale() == 'en')
                            <h2>{{ trans('homy_trans.Our valuable') }} <span>{{ trans('homy_trans.Agents') }}</span></h2>
                        @else
                            <h2>{{ trans('homy_trans.Agents') }} <span>{{ trans('homy_trans.Our valuable') }}</span></h2>
                        @endif

                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="agent-carousel" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>

                        <?php $agents = \App\Models\Agent::all();  ?>
                        @foreach ($agents as $agent )
                            <div class="at-agent-col">
                                <div class="at-agent-img">
                                    @if($agent->photo)
                                        <img src="{{url('image/agents/'.$agent->photo)}}" style="width: 100%; height: 352px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('app-assets/images/agents/2.png')}}" alt="">
                                    @endif
                                    {{-- <img src="{{ url('images/agents/'.$agent->photo)}}" alt=""> --}}
                                    <div class="at-agent-social">
                                        <a href="{{ $agent->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="{{ $agent->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="{{ $agent->linked_in }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href="{{ $agent->email }}" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
                                        <div class="at-agent-call">
                                            <p>{{ $agent->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="at-agent-info">
                                    <h4><a href="/home/agents/{{ $agent->id }}" target="_blank">
                                        @if (App::getLocale() == 'en')
                                            @if ($agent->name_en !='')
                                                <th>{{ $agent->name_en }}</th>
                                            @else
                                                <th>{{ $agent->name_ar }}</th>
                                            @endif
                                        @else
                                            <th>{{ $agent->name_ar }}</th>
                                        @endif
                                    </a></h4>
                                    <p>
                                        @if (App::getLocale() == 'en')
                                            @if ($agent->position_en !='')
                                                <th>{{ $agent->position_en }}</th>
                                            @else
                                                <th>{{ $agent->position_ar }}</th>
                                            @endif
                                        @else
                                            <th>{{ $agent->position_ar }}</th>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Agents End -->

    <!-- Blog start from here -->
    <section class="at-blog-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="at-sec-title at-sec-title-left">
                        @if (App::getLocale() == 'en')
                            <h2>{{ trans('homy_trans.PREVIOUS') }} <span>{{ trans('homy_trans.PROPERTY') }}</span></h2>
                        @else
                            <h2>{{ trans('homy_trans.PROPERTY') }} <span>{{ trans('homy_trans.PREVIOUS') }}</span></h2>
                        @endif

                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row animatedParent animateOnce">


                <?php     $previous_properties= \App\Models\Property::orderBy('id', 'desc')->where('status', 'sold')->paginate(3);  ?>
                @foreach ($previous_properties as $previous_property )
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="at-blog-box at-col-default-mar animated fadeInUpShort slow">
                            <div class="at-blog-img">
                                <img src="{{url('image/photo/'.$previous_property->photo)}}" alt="">
                                <div class="at-blog-date">
                                    <ul>
                                        <li><i class="icofont icofont-businessman"></i>
                                            @if (App::getLocale() == 'en')
                                                @if ($previous_property->city_en !='')
                                                    {{ \Str::limit($previous_property->city_en, 25) }}
                                                @else
                                                    {{ \Str::limit($previous_property->city_ar, 25) }}
                                                @endif
                                            @else
                                                {{ \Str::limit($previous_property->city_ar, 25) }}
                                            @endif
                                        </li>
                                        <li><i class="icofont icofont-calendar"></i><a href="#">{{ $previous_property->city_ar }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="at-blog-content">
                                <h4><a href="blog-details.html">
                                    @if (App::getLocale() == 'en')
                                        @if ($previous_property->title_en !='')
                                            {{ \Str::limit($previous_property->title_en, 25) }}
                                        @else
                                            {{ \Str::limit($previous_property->title_ar, 25) }}
                                        @endif
                                    @else
                                        {{ \Str::limit($previous_property->title_ar, 25) }}
                                    @endif
                                </a></h4>
                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($previous_property->description_en !='')
                                            {{ \Str::limit($previous_property->description_en, 25) }}
                                        @else
                                            {{ \Str::limit($previous_property->description_ar, 25) }}
                                        @endif
                                    @else
                                        {{ \Str::limit($previous_property->description_ar, 25) }}
                                    @endif
                                </p>
                                <a href="blog-details.html">{{ trans('front_trans.show_details') }}<i class="zmdi zmdi-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Newsletter start from here -->
    <section class="at-newsletter-sec jarallax at-over-layer-black">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-8">
                    <h2>Subscribe <span>Newsletter</span></h2>
                    <p></p>
                    <form action="{{ url('/home_subscribes/send') }}" method="GET" class="input-group">
                        {{-- {{ method_field('GET') }} --}}
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

@endsection
