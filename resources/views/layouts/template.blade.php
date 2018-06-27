<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Christian Gritto">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
	<link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('sufee/css/themify-icons.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('css/hawcons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/landing-page.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
		<nav class="navbar navbar-expand-sm navbar-dark bg-blue fixed-top" id="navbar">
			<div class="container">
				<a class="navbar-brand" href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-menu">
				<ul class="navbar-nav text-center">
					@guest
					<li class="navbar-item">
					<a class="nav-link mx-2" href="{{ url('login') }}">Accedi</a>
					</li>
					<li class="navbar-item">
					<a class="nav-link mx-2" href="{{ url('register') }}">Registrati</a>
					</li>
					@endguest
					@auth
					<li class="navbar-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								Esci
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					@endauth
				</ul>
				</div>
			</div>
		</nav>

	<main class="{{(isset($isLandingPage)) ? '' : 'py-4 mt-5 '}}">
		@yield('content')
	</main>

		<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
				<div class="col-lg-6 h-100 text-center text-lg-left my-auto">
		<!--	<ul class="list-inline mb-2">
					<li class="list-inline-item">
						<a href="#">About</a>
					</li>
					<li class="list-inline-item">&sdot;</li>
					<li class="list-inline-item">
						<a href="#">Contact</a>
					</li>
					<li class="list-inline-item">&sdot;</li>
					<li class="list-inline-item">
						<a href="#">Terms of Use</a>
					</li>
					<li class="list-inline-item">&sdot;</li>
					<li class="list-inline-item">
						<a href="#">Privacy Policy</a>
					</li>
					</ul> -->
					<p class="text-muted small mb-4 mb-lg-0">&copy; {{ env('APP_NAME') }} 2018. All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 h-100 text-center text-lg-right my-auto">
					<ul class="list-inline mb-0">
					<li class="list-inline-item mr-3">
						<a href="#">
						<i class="fa fa-facebook fa-2x fa-fw"></i>
						</a>
					</li>
					<li class="list-inline-item mr-3">
						<a href="#">
						<i class="fa fa-twitter fa-2x fa-fw"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
						<i class="fa fa-instagram fa-2x fa-fw"></i>
						</a>
					</li>
					</ul>
				</div>
				</div>
			</div>
			</footer>
					
			<!-- JavaScript includes -->
			<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
			<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
			<script src="{{ URL::asset('js/scroll-effects.js') }}"></script>

  </body>

</html>
