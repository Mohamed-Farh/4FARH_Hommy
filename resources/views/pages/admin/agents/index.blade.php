@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('homy_trans.agents') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('homy_trans.agents') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <button type="button" class="button x-small">
                <a href="{{ route('agents.create') }}">{{ trans('front_trans.add') }}</a>
            </button>
            <br><br>


            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('front_trans.photo') }}</th>
                            <th>{{ trans('admins_trans.Name') }}</th>
                            <th>{{ trans('homy_trans.phone') }}</th>
                            <th>{{ trans('homy_trans.ex_years') }}</th>
                            <th>{{ trans('homy_trans.position') }}</th>
                            <th>{{ trans('homy_trans.aboutme') }}</th>
                            <th>{{ trans('homy_trans.socials') }}</th>
                            <th>{{ trans('feature_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($agents as $agent)
                            <tr>
                                <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    @if($agent->photo)
                                        <td><img class="img-responsive thumbnail" src="{{url('image/agents/'.$agent->photo)}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                    @endif

                                    @if (App::getLocale() == 'en')
                                        @if ($agent->name_en !='')
                                            <th>{{ $agent->name_en }}</th>
                                        @else
                                            <th>{{ $agent->name_ar }}</th>
                                        @endif
                                    @else
                                        <th>{{ $agent->name_ar }}</th>
                                    @endif

                                    <th>{{ $agent->phone }}</th>
                                    <th>{{ $agent->ex_years }}</th>

                                    @if (App::getLocale() == 'en')
                                        @if ($agent->position_en !='')
                                            <th>{{ $agent->position_en }}</th>
                                        @else
                                            <th>{{ $agent->position_ar }}</th>
                                        @endif
                                    @else
                                        <th>{{ $agent->position_ar }}</th>
                                    @endif

                                    @if (App::getLocale() == 'en')
                                        @if ($agent->about_en !='')
                                            <th>{{ $agent->about_en }}</th>
                                        @else
                                            <th>{{ $agent->about_ar }}</th>
                                        @endif
                                    @else
                                        <th>{{ $agent->about_ar }}</th>
                                    @endif

                                    <th>
                                        <a href="{{ $agent->email }}"     target="_blank" style="color: blue">E-Mail</a>   <br>
                                        <a href="{{ $agent->facebook }}"  target="_blank" style="color: blue">Facebook</a> <br>
                                        <a href="{{ $agent->twitter }}"   target="_blank" style="color: blue">Twitter</a>  <br>
                                        <a href="{{ $agent->linked_in }}" target="_blank" style="color: blue">Linked In</a><br>
                                    </th>

                                    <td>
                                        {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#show{{ $agent->id }}"
                                            title="{{ trans('feature_trans.show_agents') }}"><i
                                                class="fa fa-eye"></i></button> --}}

                                        <a href="{{ route('agents.edit',$agent->id) }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $agent->id }}"
                                            title="{{ trans('feature_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

                            <!-- show_modal_feature -->
                            {{-- <div class="modal fade" id="show{{ $agent->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('front_trans.show_agents') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <div class="row" style="border: ridge;">
                                                    <div class="col-12 small_space">
                                                        <h3>{{ trans('front_trans.agents_ar') }}</h3>
                                                        <h6>{{ $agent->head_ar }}</h6><br>
                                                        <h6>{{ $agent->body_ar }}</h6>
                                                    </div>
                                                </div>
                                                <div class="row" style="border: ridge;">
                                                    <div class="col-12 small_space">
                                                        <h3>{{ trans('front_trans.agents_en') }}</h3>
                                                        <h6>{{ $agent->head_en }}</h6><br>
                                                        <h6>{{ $agent->body_en }}</h6>
                                                    </div>
                                                </div>
                                                <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- delete_modal_feature -->
                            <div class="modal fade" id="delete{{ $agent->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('feature_trans.Delete') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('agents.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('feature_trans.Warning_feature') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $agent->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('feature_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('front_trans.Delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            tabSize: 2,
            height: 100,
        });
        $("#summernote").code()
            .replace(/<\/p>/gi, "\n")
            .replace(/<br\/?>/gi, "\n")
            .replace(/<\/?[^>]+(>|$)/g, "");
    });
</script>
@endsection
