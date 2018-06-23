<!-- Navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-blue fixed-top" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbar-menu">
			<ul class="navbar-nav text-center">
			  @unless (Auth::check())
			  <li class="navbar-item">
				<a class="nav-link mx-2" href="{{ url('login') }}">Accedi</a>
			  </li>
			  <li class="navbar-item">
				<a class="nav-link mx-2" href="{{ url('register') }}">Registrati</a>
			  </li>
			  @else
			  <li class="navbar-item">
				  <a class="nav-link mx-2" href="{{ url('profile/'.$user['name']) }}">{{ $user['name'] }}</a>
			  </li>
			  @endunless
			</ul>
		  </div>
		</div>
	  </nav>