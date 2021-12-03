<!DOCTYPE html>
<html>

<head>
    <title>{{ trans('homy_trans.agents') }}</title>
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
                        <h2>{{ trans('homy_trans.agents') }}</h2>
                        <p><a href="/home">{{ trans('front_trans.home') }}</a>
                            @if (App::getLocale() == 'en')
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            @endif
                            <a href="{{ route('/home/agents') }}">{{ trans('homy_trans.agents') }}</a>
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

    <!-- Agents start from here -->
    <section class="at-agents-sec at-agents-sec-three">
        <div class="container">
            <div class="row">

                @foreach ($agents as $agent )
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="at-agent-col">
                            <div class="at-agent-img">
                                   @if($agent->photo)
                                        <img src="{{url('image/agents/'.$agent->photo)}}" style="width: 100%; height: 352px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('app-assets/images/agents/2.png')}}" alt="">
                                    @endif
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
                    </div>
                @endforeach
            </div>



            <div class="at-pagination">
                {{ $agents->links() }}
            </div>
        </div>
    </section>
    <!-- Agents End -->





    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>
{{-- @jquery --}}
@toastr_js
@toastr_render

</html>
