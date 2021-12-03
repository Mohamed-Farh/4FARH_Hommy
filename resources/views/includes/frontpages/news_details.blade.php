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



    <!-- Property start from here -->
    <section class="at-blog-sec at-blog-details-sec">
        <div class="container">
            <div class="row animatedParent animateOnce">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="at-blog-box at-col-default-mar">
                                <div class="at-blog-img at-blog-big-img">
                                    @if($single_new->photo)
                                        <img src="{{url('image/news/'.$single_new->photo)}}"/>
                                    @else
                                        <img src="{{url('image/news/default.jpg')}}"/>
                                    @endif
                                    <div class="at-blog-date">
                                        <ul>
                                            <li class="center"><i class="icofont icofont-calendar"></i><a >{{ $single_new->created_at->toFormattedDateString() }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h4><a>
                                    @if (App::getLocale() == 'en')
                                        @if ($single_new->head_en !='')
                                            <th>{{  $single_new->head_en }}</th>
                                        @else
                                            <th>{{  $single_new->head_ar }}</th>
                                        @endif
                                    @else
                                        <th>{{  $single_new->head_ar }}</th>
                                    @endif
                                </a></h4>
                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($single_new->body_en !='')
                                            <th>{{  $single_new->body_en }}</th>
                                        @else
                                            <th>{{  $single_new->body_ar }}</th>
                                        @endif
                                    @else
                                        <th>{{  $single_new->body_ar  }}</th>
                                    @endif
                                </p>
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









    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>
{{-- @jquery --}}
@toastr_js
@toastr_render

</html>
