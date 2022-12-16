<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>@yield('title')</title>
		<link rel="icon" type="image/*" href="{{ asset('assets/images/logo/logo.jpg') }}" sizes="128x128" />

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
        <link rel="stylesheet" href="{{ url('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light') }}">

		<!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}">

		<!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/morris/morris.css') }}">

		<!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.css') }}">

		<!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('assets/stylesheets/skins/default.css') }}">

		<!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('assets/vendor/modernizr/modernizr.js') }}"></script>

		<style>
			@media print {
				.d-print-none {
				 	display: none!important;
				}
			}
		</style>
		
        @yield('header')

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="{{ asset('assets/images/logo/logo.jpg') }}" height="35" alt="iStock" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
                
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>

					<span class="separator"></span>
                    
					@if(Auth::user())

					<!-- if login exist -->
                    <div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="{{ asset('assets/images/!happy-face.png') }}" alt="Ahmad User" class="img-circle" data-lock-picture="{{ asset('assets/images/!happy-face.png') }}" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name">{{ Auth::user()->name }}</span>
								<span class="role">{{ ucfirst(Auth::user()->role) }}</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								@if(Auth::user()->role == "trader")
								<li>
									<a role="menuitem" tabindex="-1" href="{{ route('trader.profile') }}"><i class="fa fa-user"></i> My Profile</a>
								</li>
								@endif
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
									    <button role="menuitem" tabindex="-1" type="submit"><i class="fa fa-power-off"></i> Logout</button>
                                    </form>
								</li>
							</ul>
						</div>
					</div>

					@else
					<!-- if not login -->
					<div id="userbox" class="userbox">
                        <a href="{{ route('login') }}" class="btn btn-info btn-sm">Sign In <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        <a href="{{ route('register') }}" class="btn btn-info btn-sm">Sign Up <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </div>

					@endif

				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title text-info">
							Menu
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									
									<li class="@if(Route::currentRouteName() == 'home') nav-active @endif">
										<a href="{{ route('home') }}">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Home</span>
										</a>
									</li>
									@if(Auth::user())
										@if(Auth::user()->role == "trader")
									
										<!-- login as trader -->
										<li class="@if(Route::currentRouteName() == 'dashboard') nav-active @endif">
											<a href="{{ route('dashboard') }}">
												<i class="fa fa-dashboard" aria-hidden="true"></i>
												<span>Dashboard</span>
											</a>
										</li>
										<li class="@if(strpos(Route::currentRouteName(), 'portfolio') !== false)  nav-active @endif">
											<a href="#" style="display: none">
												<i class="fa fa-bar-chart-o" aria-hidden="true"></i>
												<span>Portfolio</span>
											</a>
										</li>
										<li class="nav-parent @if(strpos(Route::currentRouteName(), 'company') !== false) nav-active @endif">
											<a>
												<i class="fa fa-users" aria-hidden="true"></i>
												<span>Company</span>
											</a>
											<ul class="nav nav-children">
												<li>
													<a href="{{ route('company.list') }}">
														List Company
													</a>
												</li>
												<li>
													<a href="{{ route('company.compare') }}">
														Compare Company
													</a>
												</li>
												<li>
													<a href="{{ route('company.comparePredict') }}">
														Prediction Comparison
													</a>
												</li>
												{{-- <li>
													<a href="#">
														Company Data
													</a>
												</li> --}}
											</ul>
										</li>
										<li class="@if(strpos(Route::currentRouteName(), 'sector') !== false) nav-active @endif">
											<a href="{{ route('sector.list') }}">
												<i class="fa fa-briefcase" aria-hidden="true"></i>
												<span>Sector</span>
											</a>
										</li>
										{{-- <li class="@if(strpos(Route::currentRouteName(), 'screener') !== false)  nav-active @endif">
											<a href="{{ route('screener.list') }}">
												<i class="fa fa-desktop" aria-hidden="true"></i>
												<span>Screener</span>
											</a>
										</li> --}}
									
										@elseif(Auth::user()->role == "admin")
									
										<!-- login as admin -->
										<li class="@if(Route::currentRouteName() == 'dashboard') nav-active @endif">
											<a href="{{ route('dashboard') }}">
												<i class="fa fa-dashboard" aria-hidden="true"></i>
												<span>Dashboard</span>
											</a>
										</li>

										<li class="nav-parent @if(strpos(Route::currentRouteName(), 'company') !== false) nav-active @endif">
											<a>
												<i class="fa fa-users" aria-hidden="true"></i>
												<span>Company</span>
											</a>
											<ul class="nav nav-children">
												<li>
													<a href="{{ route('company.register') }}">
														Register Company
													</a>
												</li>
												<li>
													<a href="{{ route('company.list') }}">
														List Company
													</a>
												</li>
												{{-- <li>
													<a href="#">
														Company Data
													</a>
												</li> --}}
											</ul>
										</li>

										<li class="@if(strpos(Route::currentRouteName(), 'sector') !== false) nav-active @endif">
											<a href="{{ route('sector.list') }}">
												<i class="fa fa-briefcase" aria-hidden="true"></i>
												<span>Sector</span>
											</a>
										</li>
									
										@endif
									@endif
									
									<li class="@if(Route::currentRouteName() == 'aboutus') nav-active @endif">
										<a href="{{ route('aboutus') }}">
											<i class="fa fa-info-circle" aria-hidden="true"></i>
											<span>About Us</span>
										</a>
									</li>

								</ul>
							</nav>
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

                @yield('content')

			</div>
		</section>

		<!-- Vendor -->
        <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
		
		<!-- Specific Page Vendor -->
        <script src="{{ asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-appear/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js') }}"></script>
        <script src="{{ asset('assets/vendor/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js') }}"></script>
        <script src="{{ asset('assets/vendor/flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('assets/vendor/flot/jquery.flot.categories.js') }}"></script>
        <script src="{{ asset('assets/vendor/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
        <script src="{{ asset('assets/vendor/raphael/raphael.js') }}"></script>
        <script src="{{ asset('assets/vendor/morris/morris.js') }}"></script>
        <script src="{{ asset('assets/vendor/gauge/gauge.js') }}"></script>
        <script src="{{ asset('assets/vendor/snap-svg/snap.svg.js') }}"></script>
        <script src="{{ asset('assets/vendor/liquid-meter/liquid.meter.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/jquery.vmap.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/data/jquery.vmap.sampledata.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js') }}"></script>
		
		<!-- Theme Base, Components and Settings -->
        <script src="{{ asset('assets/javascripts/theme.js') }}"></script>
		
		<!-- Theme Custom -->
        <script src="{{ asset('assets/javascripts/theme.custom.js') }}"></script>
		
		<!-- Theme Initialization Files -->
        <script src="{{ asset('assets/javascripts/theme.init.js') }}"></script>

		<!-- Sweet alert- -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		@include('sweetalert::alert')

        @yield('script');

	</body>
</html>