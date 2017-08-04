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
										<a href="{{url('/')}}" class="logo-name text-lg text-center"><img src="{{asset('img/color-logo.png')}}" width="130" /></a>
										<p class="text-center m-t-md">Isikan email Anda untuk mendapatkan password baru.</p>
										<form class="m-t-md" method="POST" action="{{ url('/password/reset') }}">
											{{ csrf_field() }}
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Email" required>
											</div>
											<button type="submit" class="btn btn-ijo btn-block">Reset Password</button>
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