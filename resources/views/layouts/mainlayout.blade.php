<!DOCTYPE html>
<html lang="en">

 	<head>

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



		@yield('content')

		@include('layouts.partials.footer')

		@include('layouts.partials.footer-scripts')
        <script type="text/javascript" src="{{ asset('app-assets/js/main.js') }}"></script>

 	</body>
     @toastr_js
     @toastr_render

</html>
