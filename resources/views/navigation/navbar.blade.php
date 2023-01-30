<header class="navbar-light header-sticky">
	<!-- Nav START -->
	<nav class="navbar navbar-expand-md">
		<div class="container icon-nav-container">
			<a class="nav-link" href="{{ url('/') }}">
				<img class="light-mode-item logo" src="{{ asset('images/wbbonline_img_1.png') }}" alt="logo">
			</a>

			<div class="d-flex order-lg-2 ms-auto header-right-icons"> 
				<ul class="navbar-nav justify-content-end">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}"><img class="register-nav" src="{{ asset('images/wbbonline_btn_1.png') }}" alt="register"></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('favourites') }}"><img class="favourites-nav" src="{{ asset('images/wbbonline_btn_2.png') }}" alt="favourites"></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<nav class="navbar navbar-expand-sm">
		<div class="container">
			<ul class="navbar-nav justify-content-end links">
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/') }}">HOME</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					AUCTIONS
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('auction') }}">LIVE AUCTION</a>
						<a class="dropdown-item" href="{{ route('catalogue') }}">AUCTION CATALOGUE</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					DEALERS
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('profile') }}">MY ACCOUNT</a>
						<a class="dropdown-item" href="{{ url('dashboard') }}">DASHBOARD</a>
						<form method="POST" action="{{ route('logout') }}" id="logout">
							@csrf
							<a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">LOGOUT</a>
						</form>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					OPTIONS
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Action</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					COMPANY
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('/about-us') }}">ABOUT</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/contact-us') }}"><img class="contact-nav" src="{{ asset('images/wbbonline_btn_3.png') }}" alt="contact-us"></a>
				</li>
			</ul>
		</div>
	</nav>

	<nav class="navbar navbar-mobile">
		<div class="container-fluid justify-content-center">
			<center>
			<a type="button" class="btn btn-link" data-toggle="collapse" href="#collapseLinks" role="button" aria-expanded="false" aria-controls="collapseExample">
				<i style="color:white; font-size:18px"class="fa-solid fa-bars"></i>
			</a>
			</center>
		</div>
	</nav>
	<div class="collapse mobile-nav-collapse" id="collapseLinks">
		<div class="card card-body mobile-nav-card">
			<ul class="navbar-nav justify-content-center">
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/') }}">HOME</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					AUCTIONS
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('auction') }}">LIVE AUCTION</a>
						<a class="dropdown-item" href="{{ url('catalogue') }}">AUCTION CATALOGUE</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					DEALERS
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('profile') }}">MY ACCOUNT</a>
						<a class="dropdown-item" href="{{ url('dashboard') }}">DASHBOARD</a>
						<a class="dropdown-item" href="#">LOGOUT</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					OPTIONS
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Action</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					COMPANY
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('about-us') }}">ABOUT</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('contact-us') }}"><img class="contact-nav" src="{{ asset('images/wbbonline_btn_3.png') }}" alt="contact-us"></a>
				</li>
			</ul>
		</div>
	</div>

	<div class="nav-containter">
		<img  class="container-img" src="{{ asset('images/wbbonline_img_3.png') }}" alt="nav-img">
	</div>
	
	<!-- Nav END -->
</header>