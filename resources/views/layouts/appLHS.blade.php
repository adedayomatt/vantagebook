<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.inc.head')
<body>
    <div id="app">
		@include('layouts.inc.navbar')
		<div class="container">
			<div class="row">
				<div class="col-md-4">
				@yield('lhs')
				</div>

				<div class="col-md-8">
				@include('include.session')
				@yield('content')
				</div>
			</div>
		</div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
	@yield('script')
</body>
</html>
