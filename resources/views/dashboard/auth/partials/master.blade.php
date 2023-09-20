<!doctype html>

<html lang="en">

@include('dashboard.auth.partials.head')

<body class="">
    <!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				@yield('content')
			</div>
		</div>
	</div>
	<!--end wrapper-->
    @include('dashboard.auth.partials.script')
</body>
</html>
