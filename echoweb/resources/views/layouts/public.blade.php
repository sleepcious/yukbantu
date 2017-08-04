<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('nama') - {{ config('app.name') }}</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
		
		<link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/apple-touch-icon.png')}}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon-16x16.png')}}">
		<link rel="manifest" href="{{asset('img/manifest.json')}}">
		<link rel="mask-icon" href="{{asset('img/safari-pinned-tab.svg')}}" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">
		
		@yield('meta_tag')
        
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
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
		<link href="{{asset('admin-theme/assets/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin-theme/assets/plugins/datatables/css/jquery.datatables.min.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/datatables/css/jquery.datatables_themeroller.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/metrojs/MetroJs.min.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin-theme/assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"/>	
        	
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
    <body class="page-header-fixed general">
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
                    <div class="logo-box hidden-xs">
                        <a href="{{url('/')}}" class="logo-text"><span><img src="{{asset('img/color-logo.png')}}" width="120" /></span></a>
                    </div><!-- Logo Box -->
					<div class="logo-box visible-xs-block">
                        <a href="{{url('/')}}" class="logo-text"><span><img src="{{asset('img/white-logo.png')}}" width="120" /></span></a>
                    </div><!-- Logo Box -->
                    <div class="topmenu-outer">
                        <div class="top-menu hidden-xs">
							<ul class="nav navbar-nav navbar-left">
								<li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i> Cari Campaign</a>
                                </li>
							</ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
									<a href="{{url('galangdana')}}" title="galang bantuan">
										Galang Bantuan
									</a>
								</li>
								<li>
									<a href="{{url('jelajah')}}" title="donasi">
										Saya Mau Bantu
									</a>
								</li>
								<li>
									<a href="{{url('relawan')}}" title="donasi">
										Relawan
									</a>
								</li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
									@if(\Auth::guest())
									<ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Masuk</a></li>
                                        <li role="presentation"><a href="{{ route('register') }}"><i class="fa fa-puzzle-piece"></i>Daftar</a></li>
                                        <li role="presentation"><a href="{{url('faq')}}"><i class="fa fa-question-circle"></i>Bantuan</a></li>
                                    </ul>
									@else
									<div class="dropdown-menu dropdown-list panel" role="menu">
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
						<div class="top-menu visible-xs-block">
							<div class="pull-left">
								<a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
							</div>
							<div class="pull-right mobile-menu">
								<div class="dropdown">
									<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
									@if(\Auth::guest())
									<ul class="dropdown-menu dropdown-list" role="menu">
										<li><a href="{{url('galangdana')}}" title="galang bantuan">Galang Bantuan</a></li>
										<li><a href="{{url('jelajah')}}" title="donasi">Saya Mau Bantu</a></li>
										<li><a href="{{url('relawan')}}" title="relawan">Relawan</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li role="presentation"><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Masuk</a></li>
                                        <li role="presentation"><a href="{{ route('register') }}"><i class="fa fa-puzzle-piece"></i>Daftar</a></li>
                                        <li role="presentation"><a href="login.html"><i class="fa fa-question-circle"></i>Bantuan</a></li>
                                    </ul>
									@else
									<ul class="dropdown-menu dropdown-list" role="menu">
										<li class="panel-body text-center">
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
										</li>
										<li><a href="{{url('galangdana')}}" title="galang bantuan">Galang Bantuan</a></li>
										<li><a href="{{url('jelajah')}}" title="donasi">Saya Mau Bantu</a></li>
										<li><a href="{{url('relawan')}}" title="relawan">Relawan</a></li>
                                        <li role="presentation"><a href="login.html"><i class="fa fa-question-circle"></i>Bantuan</a></li>
                                        <li role="separator" class="divider"></li>
                                        @if(\Auth::user()->role == 1)
                                        <li role="presentation"><a href="{{url('pengelola')}}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
										@else
                                        <li role="presentation"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
										@endif
                                        <li role="presentation"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-block btn-danger"><i class="fa fa-sign-out"></i> Keluar</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form></li>
                                    </ul>
									@endif
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div><!-- Navbar -->
			
			@yield('content')
			
			<div class="sub-footer">
				<div class="container">
					<div class="pull-left"><img src="{{asset('img/color-logo.png')}}" width="130" /></div>
					<div class="pull-right"><img src="{{asset('img/color-logo.png')}}" width="130" /></div>
				</div>
			</div>
			
			<div class="page-footer homepublic">
				<div class="container">
					footer
				</div>
			</div>
			
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
        <!-- <script src="{{asset('admin-theme/assets/plugins/3d-bold-navigation/js/main.js')}}"></script> -->
        <script src="{{asset('admin-theme/assets/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/jquery-counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/morris/raphael.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/plugins/metrojs/MetroJs.min.js')}}"></script>
        <script src="{{asset('admin-theme/assets/js/modern.js')}}"></script>
        <!-- <script src="{{asset('admin-theme/assets/js/pages/dashboard.js')}}"></script> -->
		
		@yield('additional')
        
    </body>
</html>