@extends('layouts.public')

@section('nama')
	Register
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
										<p class="text-center m-t-md">Lorem ipsum dolor sit amet</p>
										<p class="text-center m-t-md">
											<a href="{{url('redirect')}}" class="btn btn-facebook btn-block"><i class="fa fa-facebook"></i> Daftar dengan Facebook</a>
										</p>
										<p class="text-center m-t-md">
											<a href="{{url('redirect/google')}}" class="btn btn-google btn-block"><i class="fa fa-google-plus"></i> Daftar dengan Google</a>
										</p>
										<p class="text-center m-t-md"><strong>atau</strong></p>
										<form class="m-t-md" method="POST" method="POST" action="{{ url('daftar') }}">
											{{ csrf_field() }}
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Nama" name="name" required>
											</div>
											<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
												<input type="email" class="form-control" placeholder="Email" name="email" required>
												@if ($errors->has('email'))
													<p class="help-block text-danger">
														{{ $errors->first('email') }}
													</p>
												@endif
											</div>
											<label>
												<input type="checkbox" value="2" name="tipe"> Daftar sebagai organisasi/komunitas
											</label>
											<button type="submit" class="btn btn-ijo btn-block m-t-xs">Daftar</button>
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