@extends('layouts.public')

@section('nama')
	Terima Kasih
@endsection

@section('content')
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-8 center">
							<div class="panel panel-white">
								<div class="panel-body">
									<div class="login-box">
										<a href="{{url('/')}}" class="logo-name text-lg text-center"><img src="{{asset('img/color-logo.png')}}" width="130" /></a>
										<h2 class="text-center m-t-md">Terima Kasih!</h2>
										<h3 class="text-center m-t-md">Silakan cek email Anda untuk password login.</h3>
										<br />
										<a href="{{route('login')}}" class="btn btn-ijo btn-block">Login</a>
									</div>
								</div>
							</div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
@endsection