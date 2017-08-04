@extends('layouts.public')

@section('nama')
	Reset Password
@endsection

@section('content')
	<main class="page-content">
		<div class="page-inner">
			<div id="main-wrapper">
				<div class="row">
					<div class="col-md-3 center">
						<div class="panel panel-white">
							<div class="panel-body">
								<div class="login-box">
									<a href="index.html" class="logo-name text-lg text-center"><img src="{{asset('img/color-logo.png')}}" width="130" /></a>
									<p class="text-center m-t-md">Lorem ipsum dolor sit amet</p>
									<p class="text-center m-t-md">
										<a href="{{url('redirect')}}" class="btn btn-facebook btn-block"><i class="fa fa-facebook"></i> Login dengan Facebook</a>
									</p>
									<p class="text-center m-t-md">
										<a href="{{url('redirect/google')}}" class="btn btn-google btn-block"><i class="fa fa-google-plus"></i> Login dengan Google</a>
									</p>
									<p class="text-center m-t-md"><strong>atau</strong></p>
									<form class="m-t-md" method="POST" action="{{ route('login') }}">
										{{ csrf_field() }}
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Email" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Password" required>
										</div>
										<button type="submit" class="btn btn-ijo btn-block">Login</button>
										<a href="{{ route('password.request') }}" class="display-block text-center m-t-md text-sm">Lupa Password?</a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div><!-- Row -->
			</div><!-- Main Wrapper -->
		</div><!-- Page Inner -->
	</main><!-- Page Content -->
@endsection