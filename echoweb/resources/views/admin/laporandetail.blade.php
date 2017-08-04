@extends('layouts.admin')

@section('nama')
	Detail Laporan
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Laporan campaign : {{$laporan->kampanye->judul}}</h3>
						</div>
						<div class="panel-body">
							<h3>{{$laporan->pengguna->name}}</h3>
							<h4>{{$laporan->pengguna->email}}</h4>
							<p><a href="{{url($laporan->kampanye->link_campaign)}}">{{$laporan->kampanye->judul}}</a></p>
							<p>{{$laporan->komentar}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional')

@endsection