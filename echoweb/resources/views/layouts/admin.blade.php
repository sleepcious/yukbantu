<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('nama')</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
		<link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/apple-touch-icon.png')}}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon-16x16.png')}}">
		<link rel="manifest" href="{{asset('img/manifest.json')}}">
		<link rel="mask-icon" href="{{asset('img/safari-pinned-tab.svg')}}" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">
		
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="{{asset('admin-theme/assets/plugins/pace-master/themes/blue/pace-theme-flash.css')}}" rel="stylesheet"/>
        <link href="{{asset('admin-theme/assets/plugins/uniform/css/uniform.default.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('admin-theme/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-theme/assets/plugins/fontawesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-theme/assets/plugins/line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/waves/waves.min.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-theme/assets/plugins/3d-bold-navigation/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-theme/assets/plugins/slidepushmenus/css/component.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/metrojs/MetroJs.min.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"/>	
		<link href="{{asset('admin-theme/assets/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin-theme/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin-theme/assets/plugins/datatables/css/jquery.datatables.min.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/datatables/css/jquery.datatables_themeroller.css')}}" rel="stylesheet" type="text/css"/>	
        	
        <!-- Theme Styles -->
        <link href="{{asset('admin-theme/assets/css/modern.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-theme/assets/css/themes/ijo.css')}}" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-theme/assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
        
        <script src="{{asset('admin-theme/assets/plugins/3d-bold-navigation/js/modernizr.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js')}}"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed admin-page">
        <div class="overlay"></div>
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Cari judul atau nama campaign">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
					<div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar" title="sidebar">
                            <i class="icon-drawer"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="{{url('/')}}" class="logo-text"><span><img src="{{asset('img/color-logo.png')}}" width="120" /></span></a>
                    </div><!-- Logo Box -->
					<!-- <div class="search-button"> -->
                        <!-- <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a> -->
                    <!-- </div> -->
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-right">
								<li>
									<a href="{{url('pengelola/wallet/topup/needver')}}" title="Top Up Pending">
										<i class="icon-login"></i>
										@if(\App\Isisaku::where('status', '=', 1)->get()->count() > 0)
										<span class="badge badge-danger pull-right">{!! \App\Isisaku::where('status', '=', 1)->get()->count() !!}</span>
										@endif
									</a>
								</li>
								<li>
									<a href="{{url('pengelola/wallet/redeem/needver')}}" title="Redeem Request">
										<i class="icon-logout"></i>
										@if(\App\Ambilsaku::where('status', '=', 1)->get()->count() > 0)
										<span class="badge badge-danger pull-right">{!! \App\Ambilsaku::where('status', '=', 1)->get()->count() !!}</span>
										@endif
									</a>
								</li>
                                <li>
									<a href="{{url('pengelola/donasi/needver')}}" title="Donasi Pending">
										<i class="icon-present"></i>
										@if(\App\Donasi::where('status', '=', 1)->get()->count() > 0)
										<span class="badge badge-danger pull-right">{!! \App\Donasi::where('status', '=', 1)->get()->count() !!}</span>
										@endif
									</a>
								</li>
								<li>
									<a href="{{url('pengelola/verifikasi/needver')}}" title="User Verifikasi Request">
										<i class="icon-users"></i>
										@if(\App\Verifikasi::where('status', '=', 1)->get()->count() > 0)
										<span class="badge badge-danger pull-right">{!! \App\Verifikasi::where('status', '=', 1)->get()->count() !!}</span>
										@endif
									</a>
								</li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
									@if(\Auth::guest())
									<ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="{{ route('login') }}" class="btn btn-block btn-default"><i class="fa fa-sign-in"></i>Masuk</a></li>
                                        <li role="presentation"><a href="{{ route('register') }}" class="btn btn-block btn-default"><i class="fa fa-puzzle-piece"></i>Daftar</a></li>
                                        <li role="presentation"><a href="login.html" class="btn btn-block btn-default"><i class="fa fa-question-circle"></i>Bantuan</a></li>
                                    </ul>
									@else
									<div class="dropdown-menu dropdown-list panel panel-white" role="menu">
										<div class="panel-body text-center">
											<div class="timeline-item-header">
												<img src="{{ \Auth::user()->gambar }}" class="img-circle" width="80" alt="{{ \Auth::user()->name }}">
												<p>
													{{ \Auth::user()->name }}
													@if(\Auth::user()->role == 1)
													<small> - Administrator</small>
													@endif
												</p>
												<small>{{ \Auth::user()->email }}</small>
											</div>
										</div>
										@if(\Auth::user()->role == 1)
											<a href="{{url('pengelola')}}" class="btn btn-block btn-tosca"><i class="fa fa-dashboard"></i> Admin Dashboard</a>
										@else
											<a href="#" class="btn btn-block btn-tosca"><i class="fa fa-dashboard"></i> Dashboard</a>
										@endif
										<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-block btn-danger"><i class="fa fa-sign-out"></i> Keluar</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</div>
									@endif
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
			
			<div class="page-sidebar sidebar">
				<ul class="menu accordion-menu">
					<li class="{{ active('pengelola') }}"><a href="{{url('pengelola')}}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Dashboard</p></a></li>
					<li class="{{ active(['pengelola/campaign', 'pengelola/campaign/*']) }}"><a href="{{url('pengelola/campaign')}}" class="waves-effect waves-button"><span class="menu-icon icon-support"></span><p>Campaign</p></a></li>
					<li class="{{ active(['pengelola/donasi', 'pengelola/donasi/*']) }}"><a href="{{url('pengelola/donasi')}}" class="waves-effect waves-button"><span class="menu-icon icon-present"></span><p>Donasi</p></a></li>
					<li class="{{ active(['pengelola/laporan', 'pengelola/laporan/*']) }}"><a href="{{url('pengelola/laporan')}}" class="waves-effect waves-button"><span class="menu-icon icon-fire"></span><p>Laporan Campaign</p></a></li>
					<li class="{{ active(['pengelola/pengguna', 'pengelola/pengguna/*']) }}"><a href="{{url('pengelola/pengguna')}}" class="waves-effect waves-button"><span class="menu-icon icon-users"></span><p>User</p></a></li>
					<li class="{{ active(['pengelola/verifikasi', 'pengelola/verifikasi/*']) }}"><a href="{{url('pengelola/verifikasi')}}" class="waves-effect waves-button"><span class="menu-icon icon-user-following"></span><p>Verifikasi User</p></a></li>
					<li class="droplink {{ active(['pengelola/wallet', 'pengelola/wallet/*'], 'active open') }}">
						<a href="#" class="waves-effect waves-button"><span class="menu-icon icon-wallet"></span><p>SakuBantu</p><span class="arrow"></span></a>
						<ul class="sub-menu">
							<li class="{{ active('pengelola/wallet/all') }}"><a href="{{url('pengelola/wallet/all')}}">SakuBantu</a></li>
							<li class="{{ active(['pengelola/wallet/topup', 'pengelola/wallet/topup/*']) }}"><a href="{{url('pengelola/wallet/topup')}}">Deposit</a></li>
							<li class="{{ active(['pengelola/wallet/redeem', 'pengelola/wallet/redeem/*']) }}"><a href="{{url('pengelola/wallet/redeem')}}">Redeem</a></li>
						</ul>
					</li>
					<li class="{{ active(['pengelola/partner', 'pengelola/partner/*']) }}"><a href="{{url('pengelola/partner')}}" class="waves-effect waves-button"><span class="menu-icon icon-link"></span><p>Partner</p></a></li>
					<li class="{{ active(['pengelola/team', 'pengelola/team/*']) }}"><a href="{{url('pengelola/team')}}" class="waves-effect waves-button"><span class="menu-icon icon-umbrella"></span><p>Team</p></a></li>
					<li class="droplink {{ active(['pengelola/setting', 'pengelola/setting/*'], 'active open') }}">
						<a href="#" class="waves-effect waves-button"><span class="menu-icon icon-wrench"></span><p>Settings</p><span class="arrow"></span></a>
						<ul class="sub-menu">
							<li class="{{ active(['pengelola/setting/slideshow', 'pengelola/setting/slideshow/*']) }}"><a href="{{url('pengelola/setting/slideshow')}}">Slideshow</a></li>
							<li class="{{ active(['pengelola/setting/kategori', 'pengelola/setting/kategori/*']) }}"><a href="{{url('pengelola/setting/kategori')}}">Kategori</a></li>
							<li class="{{ active(['pengelola/setting/halaman', 'pengelola/setting/halaman/*']) }}"><a href="{{url('pengelola/setting/halaman')}}">Halaman</a></li>
							<li class="{{ active(['pengelola/setting/rekening', 'pengelola/setting/rekening/*']) }}"><a href="{{url('pengelola/setting/rekening')}}">Cara Pembayaran / Rekening</a></li>
						</ul>
					</li>
				</ul>
			</div>
			
			@yield('content')
			
			<!-- <div class="page-footer"> -->
				<!-- <div class="container"> -->
					<!-- footer -->
				<!-- </div> -->
			<!-- </div> -->
			
		</main><!-- Page Content -->
	

        <!-- Javascripts -->		
        <script src="{{asset('admin-theme/assets/plugins/jquery/jquery-2.1.4.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/pace-master/pace.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/jquery-blockui/jquery.blockui.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/switchery/switchery.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/uniform/jquery.uniform.min.js')}}"></script>
        <!-- <script src="{{asset('admin-theme/assets/plugins/offcanvasmenueffects/js/classie.js')}}"></script> -->
        <!-- <script src="{{asset('admin-theme/assets/plugins/offcanvasmenueffects/js/main.js')}}"></script> -->
        <script src="{{asset('admin-theme/assets/plugins/waves/waves.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/3d-bold-navigation/js/main.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/jquery-counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/morris/raphael.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/metrojs/MetroJs.min.js')}}"></script>
		<script src="{{asset('admin-theme/assets/plugins/select2/js/select2.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/js/modern.js')}}"></script>
        <!-- <script src="{{asset('admin-theme/assets/js/pages/dashboard.js')}}"></script> -->
		
		@yield('additional')
        
    </body>
</html>