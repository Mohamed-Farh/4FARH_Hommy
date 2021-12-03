<!DOCTYPE html>
<html>

<head>
    <title>
        @if (App::getLocale() == 'en')
            @if ($property->title_en != '')
                {{ $property->title_en }}
            @else
                {{ $property->title_ar }}
            @endif
        @else
            {{ $property->title_ar }}
        @endif
    </title>
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
                    <img src="{{ asset('app-assets/images/title.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Inner page heading end -->

    <!-- Property start from here -->
    <section class="at-property-sec at-property-right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="at-property-details-col">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ url('image/photo/' . $property->photo) }}" alt="First slide" style="width: 100%; height: 300px; object-fit: cover; object-position: bottom;">
                                </div>

                                @foreach (explode('|', $property->images) as $image)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ url('image/' . $image) }}" alt="Second slide"style="width: 100%; height: 300px; object-fit: cover; object-position: bottom;">
                                    </div>
                                @endforeach

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- End Carousel -->
                        <p style=" text-align: justify;">
                            @if (App::getLocale() == 'en')
                                @if ($property->description_en != '')
                                    <th>{{ $property->description_en }}</th>
                                @else
                                    <th>{{ $property->description_ar }}</th>
                                @endif
                            @else
                                <th>{{ $property->description_ar }}</th>
                            @endif
                        </p>
                        <div class="at-sec-title at-sec-title-left">
                            @if (App::getLocale() == 'en')
                                <h2>{{ trans('homy_trans.PROPERTY') }} <span> {{ trans('homy_trans.FEATURES') }}</span></h2>
                            @else
                                <h2>{{ trans('homy_trans.FEATURES') }} <span> {{ trans('homy_trans.PROPERTY') }}</span></h2>
                            @endif

                            <div class="at-heading-under-line">
                                <div class="at-heading-inside-line"></div>
                            </div>
                            <p> </p>
                        </div>
                        <div class="row at-property-features">
                            @if (App::getLocale() == 'en')
                                <div class="col-md-6 clearfix"  style="text-align: left;">
                                    <ul>
                                        <li>Property Type : <span class="pull-right">{{ \Str::limit($property->category->name_en,25)}}</span>
                                        </li>
                                        <li>Price : <span class="pull-right">{{ $property->size }} $</span>
                                        </li>
                                        <li>Duration : <span class="pull-right">{{ $property->discount }} %</span>
                                        </li>
                                        <li>Duration Value : <span class="pull-right">{{ $property->new_price }} $</span>
                                        </li>
                                        <li>Status : <span class="pull-right">{{ $property->used == 'used' ? trans('property_trans.used') : trans('property_trans.new') }}</span>
                                        </li>
                                        <li>Purpose : <span class="pull-right">{{ $property->purpose == 'rent' ? trans('property_trans.rent') : trans('property_trans.sale') }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Still For Sale : <span class="pull-right">{{ $property->status == 'for_sale' ? 'YES' : 'NO' }}</span>
                                        </li>
                                        <li>Full Area : <span class="pull-right">{{ $property->size }} sqft</span>
                                        </li>
                                        <li>Bedrooms : <span class="pull-right">{{ $property->bedroom }}</span>
                                        </li>
                                        <li>Bathrooms : <span class="pull-right">{{ $property->bathroom }}</span>
                                        </li>
                                        <li>Floor Number : <span class="pull-right">{{ $property->floornumber }}</span>
                                        </li>
                                        <li>No.Of.Floors : <span class="pull-right">{{ $property->property_floors }}</span>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="col-md-6 clearfix"  style="text-align:right;">
                                    <ul>
                                        <li>نوع العقار : <span class="pull-left">{{ \Str::limit($property->category->name_ar,25)}}</span>
                                        </li>
                                        <li>السعر : <span class="pull-left">{{ $property->size }} $</span>
                                        </li>
                                        <li>مدة القسط : <span class="pull-left">{{ $property->discount }} %</span>
                                        </li>
                                        <li>قيمة كل قسط : <span class="pull-left">{{ $property->new_price }} $</span>
                                        </li>
                                        <li>الحالة : <span class="pull-left">{{ $property->used == 'used' ? 'مستعمل' : 'جديد' }}</span>
                                        </li>
                                        <li>الغرض : <span class="pull-left">{{ $property->purpose == 'rent' ? 'الايجار' : 'البيع' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6" style="text-align:right">
                                    <ul>
                                        <li>مازل للبيع : <span class="pull-left">{{ $property->status == 'for_sale' ? 'نعم' : 'لا' }}</span>
                                        </li>
                                        <li>المساحة الكلية : <span class="pull-left">{{ $property->size }} sqft</span>
                                        </li>
                                        <li>غرف نوم : <span class="pull-left">{{ $property->bedroom }}</span>
                                        </li>
                                        <li>دورات المياة : <span class="pull-left">{{ $property->bathroom }}</span>
                                        </li>
                                        <li>رقم الدور : <span class="pull-left">{{ $property->floornumber }}</span>
                                        </li>
                                        <li>عدد ادوار العقار : <span class="pull-left">{{ $property->property_floors }}</span>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>


                        {{-- --------------Features Sections------------------ --}}
                        <div class="at-sec-title at-sec-title-left">
                            @if (App::getLocale() == 'en')
                                <h2>{{ trans('homy_trans.PROPERTY') }} <span> {{ trans('homy_trans.SERVICES') }}</span></h2>
                            @else
                                <h2>{{ trans('homy_trans.SERVICES') }} <span> {{ trans('homy_trans.PROPERTY') }}</span></h2>
                            @endif
                            <div class="at-heading-under-line">
                                <div class="at-heading-inside-line"></div>
                            </div>
                            <div class="at-sidebar-tags">
                                <div class="row">
                                    @foreach ( $property->features as  $feature)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <a style="width: 100%; text-align:center">
                                                @if (App::getLocale() == 'en')
                                                    @if ($feature->name_en != '')
                                                        {{ $feature->name_en}}
                                                    @else
                                                        {{ $feature->name_ar}}
                                                    @endif
                                                @else
                                                    {{ $feature->name_ar }}
                                                @endif
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        {{-- --------------Location Sections------------------ --}}
                        <div class="at-sec-title at-sec-title-left">
                            @if (App::getLocale() == 'en')
                                <h2>{{ trans('homy_trans.PROPERTY') }} <span> {{ trans('homy_trans.LOCATION') }}</span></h2>
                            @else
                                <h2>{{ trans('homy_trans.LOCATION') }} <span> {{ trans('homy_trans.PROPERTY') }}</span></h2>
                            @endif
                            <div class="at-heading-under-line">
                                <div class="at-heading-inside-line"></div>
                            </div>

                            <div class="at-sidebar-tags">
                                <div class="at-info-box at-col-default-mar">
                                    <h4 style="color: #D19200;"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 20px;"></i>
                                        @if (App::getLocale() == 'en')
                                            {{ $property->country_en }} - {{ $property->city_en }} - {{ $property->address_en }}
                                        @else
                                            {{ $property->country_ar }} - {{ $property->city_ar }} - {{ $property->address_ar }}
                                        @endif
                                    </h4>
                                    <br>
                                    <h4 style="color: #D19200;">{{ trans('property_trans.nearby') }} : </h4>
                                    @if (App::getLocale() == 'en')
                                        <p style="text-align: justify">{{ $property->nearby_en }}</p>
                                    @else
                                        <p style="text-align: justify">{{ $property->nearby_ar }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>



                        {{-- --------------Video Sections------------------ --}}
                        <div class="at-sec-title at-sec-title-left">
                            @if (App::getLocale() == 'en')
                                <h2>{{ trans('homy_trans.PROPERTY') }} <span> {{ trans('homy_trans.VIDEO') }}</span></h2>
                            @else
                                <h2>{{ trans('homy_trans.VIDEO') }} <span> {{ trans('homy_trans.PROPERTY') }}</span></h2>
                            @endif
                            <div class="at-heading-under-line">
                                <div class="at-heading-inside-line"></div>
                            </div>
                            <div class="at-sidebar-tags">
                                <iframe width="100%" height="315" src="{{ $property->video }}">
                                </iframe>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="at-comment-row">
                                    <h3><a>{{ trans('homy_trans.property_comments') }}</a></h3>

                                    <?php  $property_comments = \App\Models\Property_Comment::where('property_id', $property->id )->paginate(5); ?>
                                    @foreach ($property_comments as $property_comment )
                                        <div class="at-comment-item">

                                            <?php $user = \App\User::where('id', $property_comment->user_id)->first(); ?>
                                            <img src="{{url('image/users/'.$user->image)}}" alt="">
                                            <h5>{{ $user->name }}</h5>
                                            <span class="comment_date">{{ $property_comment->created_at->diffForHumans() }}</span>
                                            <p class="comment_date" style="text-align: justify">{{ $property_comment->property_comment }}</p>

                                            {{-- <div>
                                                <?php $comment_file  = $property_comment->file; ?>
                                                @if($comment_file != 'null')
                                                    <img src="{{url('files/property_comment/'.$comment_file)}}" alt="">
                                                @endif
                                            </div> --}}
                                        </div>
                                    @endforeach
                                </div>
                                <div style="text-align: center; margin-bottom:5px">
                                    <span style="text-align: center; margin-bottom:5px">{{ $property_comments->links() }}</span>
                                </div>
                            </div>
                        </div>



                        <div class="at-form-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('home/property_add_comment') }}" method="POST" enctype="multipart/form-data"
                                        autocomplete="off">
                                            @csrf

                                        <input type="hidden" class="form-control" name="property_id" value="{{ $property->id }}">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <textarea class="form-control" name="property_comment" rows="5"
                                                    placeholder="Write Your Comment Here"></textarea>
                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <input type="file" class="form-control" name="file">
                                                @if ($errors->has('file'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('file') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <button class="btn btn-default hvr-bounce-to-right"
                                                    type="submit">{{ trans('front_trans.add') }}</button>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4">
                    <div class="at-sidebar at-col-default-mar">
                        <div class="at-categories clearfix">
                            <h3 class="at-sedebar-title">{{ trans('main_trans.category') }}</h3>
                            <ul>
                                <?php $categories = \App\Models\Category::all(); ?>
                                @foreach ($categories as $category)
                                    <?php $place = \App\Models\Property::where('category_id', $category->id)->count(); ?>
                                        <li>
                                            <a href="#">
                                                @if (App::getLocale() == 'en')
                                                    @if ($category->name_en != '')
                                                        {{ $category->name_en }}
                                                    @else
                                                        {{ $category->name_ar }}
                                                    @endif
                                                @else
                                                    {{ $category->name_ar }}
                                                @endif
                                            </a> <span class="category_count">&nbsp ( {{ $place }} ) &nbsp</span>
                                        </li>
                                @endforeach
                            </ul>
                        </div>




                        <div class="at-latest-news">
                            <h3 class="at-sedebar-title">{{ trans('front_trans.last_news') }}</h3>
                            <ul>
                                <?php $news = \App\Models\News::where('vision' , '1')->get(); ?>
                                @foreach ($news as $new)
                                    <li>
                                        <div class="at-news-item">
                                            @if($new->photo)
                                                <td><img class="img-responsive thumbnail" src="{{url('image/news/'.$new->photo)}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                            @else
                                                <td><img class="img-responsive thumbnail" src="{{url('image/news/default.jpg')}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                            @endif
                                            <h4><a href="/show_news/{{ $new->head_en }}">
                                                @if (App::getLocale() == 'en')
                                                    @if ($new->head_en !='')
                                                        <th>{{ \Str::limit($new->head_en,25)}}</th>
                                                    @else
                                                        <th>{{ \Str::limit($new->head_ar,25)}}</th>
                                                    @endif
                                                @else
                                                    <th>{{ \Str::limit($new->head_ar,25)}}</th>
                                                @endif
                                            </a></h4>

                                            <p>
                                                @if (App::getLocale() == 'en')
                                                    @if ($new->body_en !='')
                                                        <th>{{ \Str::limit($new->body_en,130)}}</th>
                                                    @else
                                                        <th>{{ \Str::limit($new->body_ar,130)}}</th>
                                                    @endif
                                                @else
                                                    <th>{{ \Str::limit($new->body_ar,130)}}</th>
                                                @endif
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property End -->




    <!-- Agents Details start from here -->
    <section class="at-agents-details-sec">
        <div class="container">
            <!--start map section-->
            <div id="googleMap" style="width:100%; height:400px;">
                <iframe
                    src="{{ $property->map_frame }}"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
            <!--end map section-->
        </div>
    </section>





    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

    <!-- Google map -->
    <script type="text/javascript" src="{{ asset('app-assets/js/google-map.js')}}"></script>
    <script src="{{ $property->map_frame }}"></script>

</body>
{{-- @jquery --}}
@toastr_js
@toastr_render

</html>
