@extends('layouts.admin')

@section('nama')
	Data Verifikasi
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Verifikasi Data : {{$verif->pengguna->name}}</h3>
						</div>
						<div class="panel-body">
							<h3>{{$verif->pengguna->name}}</h3>
							<h4>{{$verif->pengguna->email}}</h4>
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="verifikasi-img" style="background-image:url({{url('/echoweb/public'.$verif->id_card)}});background-size:contain;background-repeat:no-repeat;background-position:center center;"></div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="verifikasi-img" style="background-image:url({{url('/echoweb/public'.$verif->gambar)}});background-size:contain;background-repeat:no-repeat;background-position:center center;"></div>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Telepon/HP</th>
											<th>Facebook</th>
											<th>LinkedIn</th>
											<th>Website</th>
											<th>Instagram</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>{{$verif->no_telp}}</td>
											<td><a href="{{$verif->facebook}}" target="_blank">{{$verif->facebook}}</a></td>
											<td><a href="{{$verif->linkedin}}" target="_blank">{{$verif->linkedin}}</a></td>
											<td><a href="{{$verif->website}}" target="_blank">{{$verif->website}}</a></td>
											<td><a href="{{$verif->instagram}}" target="_blank">{{$verif->instagram}}</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional')

@endsection