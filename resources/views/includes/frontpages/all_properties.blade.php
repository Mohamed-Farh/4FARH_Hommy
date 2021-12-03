<!DOCTYPE html>
<html>

<head>
    <title>All Properties</title>
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
                        <h2>{{ trans('homy_trans.PROPERTY') }}</h2>
                        <p><a href="/home">{{ trans('front_trans.home') }}</a>
                            @if (App::getLocale() == 'en')
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            @endif
                            <a href="{{ route('/home/all_property') }}">{{ trans('homy_trans.PROPERTY') }}</a>
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

    <!-- Property start from here -->
    <section class="at-property-sec">
        <div class="container">
            <div class="row">

                <?php     $all_properties= \App\Models\Property::orderBy('id', 'desc')->paginate(9);  ?>
                @foreach ($all_properties as $all_property )
                    <div class="col-md-4 col-sm-6">
                        <div class="at-property-item at-col-default-mar">
                            <div class="at-property-img">
                                <img src="{{url('image/photo/'.$all_property->photo)}}" alt="">
                                <div class="at-property-overlayer"></div>
                                <a class="btn btn-default at-property-btn" href="properties-details.html" role="button">{{ trans('front_trans.show_details') }}</a>
                                <h4>{{ trans('homy_trans.for'.$all_property->purpose) }}</h4>
                                <h5>${{ $all_property->price }}</h5>
                            </div>
                            <div class="at-property-dis">
                                <ul>
                                    <li><i class="fa fa-object-group" aria-hidden="true"></i>{{ $all_property->size }} sq ft</li>
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
                @endforeach
            </div>

            <div class="at-pagination">
                {{ $all_properties->links() }}
            </div>
        </div>
    </section>
    <!-- Property End -->





    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>
{{-- @jquery --}}
@toastr_js
@toastr_render

</html>
