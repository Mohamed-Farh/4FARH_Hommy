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

    <!-- Agents Details start from here -->
    <section class="at-agents-details-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="at-singel-agent  at-col-default-mar">
                        @if($agent->photo)
                            <img src="{{url('image/agents/'.$agent->photo)}}" style="width: 100%; height: 352px; object-fit: cover;">
                        @else
                            <img src="{{ asset('app-assets/images/agents/2.png')}}" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="at-agents-details-col">
                        <h4>
                            @if (App::getLocale() == 'en')
                                @if ($agent->name_en !='')
                                    <th>{{ $agent->name_en }}</th>
                                @else
                                    <th>{{ $agent->name_ar }}</th>
                                @endif
                            @else
                                <th>{{ $agent->name_ar }}</th>
                            @endif
                        </h4>

                        <p><span style="font-weight: 600; color:#CC935C">{{ trans('homy_trans.position') }} : </span>
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
                        <p><span style="font-weight: 600; color:#CC935C">{{ trans('homy_trans.phone') }} : </span>{{ $agent->phone }}</p>
                        <p><span style="font-weight: 600; color:#CC935C">{{ trans('admins_trans.email') }} : </span>{{ $agent->email }}</p>
                        <p><span style="font-weight: 600; color:#CC935C">{{ trans('homy_trans.ex_years') }} : </span>{{ $agent->ex_years }}</p>
                        <div class="at-agent-socil-contact">
                            <a href="#" tabindex="0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" tabindex="0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" tabindex="0"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="#" tabindex="0"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                        </div>
                        <p>
                            @if (App::getLocale() == 'en')
                                @if ($agent->about_en !='')
                                    <th>{{ $agent->about_en }}</th>
                                @else
                                    <th>{{ $agent->about_ar }}</th>
                                @endif
                            @else
                                <th>{{ $agent->about_ar }}</th>
                            @endif
                        </p>
                    </div>
                </div>
            </div>


            <?php $other_agents = \App\Models\Agent::orderBy('id', 'desc')->paginate(4); ?>
            @foreach ($other_agents as $other_agent )
                @if ($other_agent->id != $agent->id )
                    <div class="row agent_show_details">
                        <div class="col-md-12">
                            <h3>{{ trans('homy_trans.other_agents') }}</h3>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="at-agent-col">
                                <div class="at-agent-img">
                                       @if($other_agent->photo)
                                            <img src="{{url('image/agents/'.$agent->photo)}}" style="width: 100%; height: 352px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('app-assets/images/agents/2.png')}}" alt="">
                                        @endif
                                        <div class="at-agent-social">
                                            <a href="{{ $other_agent->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="{{ $other_agent->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="{{ $other_agent->linked_in }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            <a href="{{ $other_agent->email }}" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
                                            <div class="at-agent-call">
                                                <p>{{ $other_agent->phone }}</p>
                                            </div>
                                        </div>
                                </div>
                                <div class="at-agent-info">
                                    <h4><a href="/home/agents/{{ $other_agent->id }}" target="_blank">
                                        @if (App::getLocale() == 'en')
                                            @if ($other_agent->name_en !='')
                                                <th>{{ $other_agent->name_en }}</th>
                                            @else
                                                <th>{{ $other_agent->name_ar }}</th>
                                            @endif
                                        @else
                                            <th>{{ $other_agent->name_ar }}</th>
                                        @endif
                                    </a></h4>
                                    <p>
                                        @if (App::getLocale() == 'en')
                                            @if ($other_agent->position_en !='')
                                                <th>{{ $other_agent->position_en }}</th>
                                            @else
                                                <th>{{ $other_agent->position_ar }}</th>
                                            @endif
                                        @else
                                            <th>{{ $other_agent->position_ar }}</th>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

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
