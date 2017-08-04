@extends('layouts.public')

@section('nama')
	Login
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
										<a href="{{url('/')}}" class="logo-name text-lg text-center"><img src="{{asset('img/color-logo.png')}}" width="130" /></a>
										<p class="text-center m-t-md">Silakan login untuk dapat mengakses semua fitur YukBantu</p>
										<p class="text-center m-t-md">
											<a href="{{url('redirect')}}" class="btn btn-facebook btn-block"><i class="fa fa-facebook"></i> Login dengan Facebook</a>
										</p>
										<p class="text-center m-t-md">
											<a href="{{url('redirect/google')}}" class="btn btn-google btn-block"><i class="fa fa-google-plus"></i> Login dengan Google</a>
										</p>
										<p class="text-center m-t-md"><strong>atau</strong></p>
										<form class="m-t-md" method="POST" action="{{ route('login') }}">
											{{ csrf_field() }}
											<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
												<input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}"  required>
												@if ($errors->has('email'))
													<p class="help-block text-danger">
														{{ $errors->first('email') }}
													</p>
												@endif
											</div>
											<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
												<input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
												@if ($errors->has('password'))
													<p class="help-block text-danger">
														{{ $errors->first('password') }}
													</p>
												@endif
											</div>
											<button type="submit" class="btn btn-ijo btn-block">Login</button>
											<a href="{{ url('password/reset') }}" class="display-block text-center m-t-md text-sm">Lupa Password?</a>
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