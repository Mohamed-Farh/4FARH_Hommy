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
    @if ($errors->any())
        <div class="error">{{ $errors->first('Name') }}</div>
    @endif

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

                <button type="button" class="button x-small back_property">
                    <a href="{{ route('agents.index') }}">{{ trans('front_trans.return') }}</a>
                </button>
                <br><br>


                <div class="card-body">

                    {!! Form::open(['route' => 'agents.store', 'method' => 'post', 'files'=>true ]) !!}
                    {{--------- About Us -----------}}
                    <div class="row beauty_top">
                        <h2 class="help">{{ trans('homy_trans.aboutme') }}</h2>
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('name_ar', trans('admins_trans.name_ar') ) !!}
                                {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control']) !!}
                                @error('name_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('name_en', trans('admins_trans.name') ) !!}
                                {!! Form::text('name_en', old('name_en'), ['class' => 'form-control']) !!}
                                @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-6  beauty_top">
                            <div class="form-group">
                                {!! Form::label('position_ar', trans('homy_trans.position_ar') ) !!}
                                {!! Form::text('position_ar', old('position_ar'), ['class' => 'form-control']) !!}
                                @error('position_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-6  beauty_top">
                            <div class="form-group">
                                {!! Form::label('position_en', trans('homy_trans.position_en') ) !!}
                                {!! Form::text('position_en', old('position_en'), ['class' => 'form-control']) !!}
                                @error('position_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('about_ar', trans('homy_trans.about_ar') ) !!}
                                {!! Form::textarea('about_ar', old('about_ar'), ['class' => 'form-control summernote']) !!}
                                @error('about_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('about_en', trans('homy_trans.about_en') ) !!}
                                {!! Form::textarea('about_en', old('about_en'), ['class' => 'form-control summernote']) !!}
                                @error('about_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row beauty">
                        <h2 class="help">{{ trans('homy_trans.socials') }}</h2>
                        <div class="col-12 small_space ">
                            {!! Form::label('photo', trans('homy_trans.personal_photo') )  !!}
                            {{ Form::file('photo', ['class' => 'form-control'] ) }}
                        </div>
                            @error('photo')<span class="text-danger">{{ $message }}</span>@enderror

                                <div class="col-6  beauty_top">
                                    <div class="form-group">
                                        {!! Form::label('phone', trans('homy_trans.phone') ) !!}
                                        {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
                                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-6  beauty_top">
                                    <div class="form-group">
                                        {!! Form::label('ex_years', trans('homy_trans.ex_years') ) !!}
                                        {!! Form::text('ex_years', old('ex_years'), ['class' => 'form-control']) !!}
                                        @error('ex_years')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="col-6  beauty_top">
                                    <div class="form-group">
                                        {!! Form::label('email', trans('homy_trans.email') ) !!}
                                        {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-6  beauty_top">
                                    <div class="form-group">
                                        {!! Form::label('facebook', trans('homy_trans.facebook') ) !!}
                                        {!! Form::text('facebook', old('facebook'), ['class' => 'form-control']) !!}
                                        @error('facebook')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="col-6  beauty_top">
                                    <div class="form-group">
                                        {!! Form::label('twitter', trans('homy_trans.twitter') ) !!}
                                        {!! Form::text('twitter', old('twitter'), ['class' => 'form-control']) !!}
                                        @error('twitter')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-6  beauty_top">
                                    <div class="form-group">
                                        {!! Form::label('linked_in', trans('homy_trans.linked_in') ) !!}
                                        {!! Form::text('linked_in', old('linked_in'), ['class' => 'form-control']) !!}
                                        @error('linked_in')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                    </div>

                    <div class="form-group pt-4">
                        {!! Form::submit( trans('front_trans.submit') , ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
    <script>
        $(function () {
            // $('.summernote').summernote({
            //     tabSize: 2,
            //     height: 200,
            //     toolbar: [
            //         ['style', ['style']],
            //         ['font', ['bold', 'underline', 'clear']],
            //         ['color', ['color']],
            //         ['para', ['ul', 'ol', 'paragraph']],
            //         ['table', ['table']],
            //         ['insert', ['link', 'picture', 'video']],
            //         ['view', ['fullscreen', 'codeview', 'help']]
            //     ]
            // });
            $('#post-images').fileinput({
                theme: "fas",
                maxFileCount: 10,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,

            });

        });
    </script>
     <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote({
                tabSize: 2,
                height: 200,
            });
        });
    </script>
@endsection


