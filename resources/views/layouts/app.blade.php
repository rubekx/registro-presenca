<!DOCTYPE html>
<html lang="en">
<head>

	@include('partials.head')

</head>
<body>
	<div id="app">
		@include('partials.navbar')

		@yield('content')

		@include('partials.footer')
	</div>


	@include('partials.scripts')

      @yield('post-script')
</body>
</html>
