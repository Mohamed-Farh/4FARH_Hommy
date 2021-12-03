@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
{{ trans('homy_trans.property_comments') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('homy_trans.property_comments') }}
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

            {{-- @if (auth()->user()->hasRole(['super_admin', 'super_admin_join', 'admin_join'])) --}}
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ __('اضـافـة') }}
                </button>
            {{-- @endif --}}
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('homy_trans.avatar') }}</th>
                            <th>{{ trans('admins_trans.Name') }}</th>
                            <th>{{ trans('homy_trans.property_comment') }}</th>
                            <th>{{ trans('homy_trans.file') }}</th>
                            <th>{{ trans('admins_trans.created_at') }}</th>
                            <th>{{ trans('main_trans.visible') }}</th>
                            <th>{{ trans('social_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            $property_comments = \App\Models\Property_Comment::orderBy('id', 'desc')->get();
                        ?>

                        @foreach ($property_comments as $property_comment)
                            @if ($property_comment)
                                <tr>
                                    <?php
                                        $i++;
                                        $user = \App\User::where('id', $property_comment->user_id )->first();
                                        ?>
                                    <td>{{ $i }}</td>

                                    @if($user->image != '')
                                        <td><img class="img-responsive thumbnail" src="{{url('image/users/'.$user->image)}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                    @else
                                        <td><img class="img-responsive thumbnail" src="{{url('image/users/avatar.png')}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                    @endif

                                    @if (App::getLocale() == 'en')
                                        @if ($user->name !='')
                                            <td>{{ $user->name }}</td>
                                        @else
                                            <td>{{ $user->name_ar }}</td>
                                        @endif
                                    @else
                                        @if ($user->name_ar !='')
                                            <td>{{ $user->name_ar }}</td>
                                        @else
                                            <td>{{ $user->name }}</td>
                                        @endif
                                    @endif

                                    <td>{{ $property_comment->property_comment }}</td>

                                    <?php $comment_file  = $property_comment->file; ?>
                                    @if($comment_file != 'null')
                                        <td><a href='/files/property_comment/{{  $comment_file }}' target="_blank" style="color: blue">Open File</a></td>
                                    @else
                                        <th>{{ trans('homy_trans.no_file') }}</th>
                                    @endif

                                    <td>{{ $property_comment->created_at->diffForHumans() }}</td>

                                    <td>
                                        @if  ($property_comment->status == '0')
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#comment{{ $property_comment->id }}"
                                            title="{{ trans('social_trans.Delete') }}"><i class="fa fa-eye-slash"></i> Un Visible </button>
                                        @elseif ($property_comment->status == '1')
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#comment{{ $property_comment->id }}"
                                            title="{{ trans('social_trans.Delete') }}"><i class="fa fa-eye"></i> Visible </button>
                                        @endif
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $property_comment->id }}"
                                            title="{{ trans('category_trans.Edit') }}"><i class="fa fa-edit"></i></button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $property_comment->id }}"
                                            title="{{ trans('category_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                                <!-- edit_modal_feature -->
                                <div class="modal fade" id="edit{{ $property_comment->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('feature_trans.edit_feature') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('property_comments.update', 'test') }}" method="post"
                                                enctype="multipart/form-data" autocomplete="off">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $property_comment->id }}">

                                                    <div class="form-group modual_space">
                                                        <div class="col">
                                                            <label for="property_comment" class="mr-sm-2">{{ trans('homy_trans.property_comment') }} : <span style="color: red"> *
                                                                </span> </label>
                                                            <textarea name="property_comment" class="form-control">{{ $property_comment->property_comment }}</textarea>
                                                            @if ($errors->has('property_comment'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('property_comment') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group modual_space">
                                                        <div class="col">
                                                            <label for="file" class="mr-sm-2">{{ trans('homy_trans.file') }} : </label>
                                                            <input type="file" class="form-control" name="file">
                                                            @if ($errors->has('file'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('file') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('اغــلاق') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ __('حفظ البيانات') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Make_comment_Visible -->
                            <div class="modal fade" id="comment{{ $property_comment->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('social_trans.edit_social') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('/property_comment/visible', 'test') }}" method="post">
                                                {{ method_field('post') }}
                                                @csrf
                                                    @if  ($property_comment->status == '0')
                                                        {{ trans('social_trans.unvisible_social') }}
                                                    @elseif ($property_comment->status == '1')
                                                        {{ trans('social_trans.visible_social') }}
                                                    @endif
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $property_comment->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">{{ trans('social_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-info">{{ trans('social_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <!-- delete_modal_feature -->
                                <div class="modal fade" id="delete{{ $property_comment->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('property_comments.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('feature_trans.Warning_feature') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $property_comment->id }}">
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
                            @endif
                        @endforeach

                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_social -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('اضـافـة') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('property_comments.store') }}" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                    @csrf
                    <input type="hidden" class="form-control" name="property_id" value="{{ $property->id }}">

                    <div class="form-group modual_space">
                        <div class="col">
                            <label for="property_comment" class="mr-sm-2">{{ trans('homy_trans.property_comment') }} : <span style="color: red"> *
                                </span> </label>
                            <textarea name="property_comment" class="form-control"></textarea>
                            @if ($errors->has('property_comment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('property_comment') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                   <div class="form-group modual_space">
                        <div class="col">
                            <label for="file" class="mr-sm-2">{{ trans('homy_trans.file') }} : </label>
                            <input type="file" class="form-control" name="file">
                            @if ($errors->has('file'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('اغــلاق') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('حفظ البيانات') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

@endsection
